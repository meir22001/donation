<?php
/**
 * Plugin Name: Sola Donation Plugin
 * Plugin URI: https://solapayments.com
 * Description: Professional bilingual (Hebrew/English) donation plugin with Sola Payments integration
 * Version: 1.0.0
 * Author: Your Name
 * Author URI: https://yourwebsite.com
 * Text Domain: sola-donation
 * Domain Path: /languages
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Define plugin constants
define('SOLA_DONATION_VERSION', '1.0.0');
define('SOLA_DONATION_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('SOLA_DONATION_PLUGIN_URL', plugin_dir_url(__FILE__));

/**
 * Plugin activation hook
 */
function sola_donation_activate() {
    // Set default options
    $default_options = array(
        'sandbox_mode' => true,
        'sandbox_key' => '',
        'production_key' => '',
        'redirect_url' => '',
        'webhook_url' => ''
    );
    
    if (!get_option('sola_donation_settings')) {
        add_option('sola_donation_settings', $default_options);
    }
}
register_activation_hook(__FILE__, 'sola_donation_activate');

/**
 * Plugin deactivation hook
 */
function sola_donation_deactivate() {
    // Cleanup if needed
}
register_deactivation_hook(__FILE__, 'sola_donation_deactivate');

/**
 * Add admin menu
 */
function sola_donation_admin_menu() {
    add_menu_page(
        __('Sola Donations', 'sola-donation'),
        __('Sola Donations', 'sola-donation'),
        'manage_options',
        'sola-donation-settings',
        'sola_donation_settings_page',
        'dashicons-heart',
        30
    );
}
add_action('admin_menu', 'sola_donation_admin_menu');

/**
 * Settings page callback
 */
function sola_donation_settings_page() {
    require_once SOLA_DONATION_PLUGIN_DIR . 'admin/settings-page.php';
}

/**
 * Register settings
 */
function sola_donation_register_settings() {
    register_setting('sola_donation_settings_group', 'sola_donation_settings', 'sola_donation_sanitize_settings');
}
add_action('admin_init', 'sola_donation_register_settings');

/**
 * Sanitize settings
 */
function sola_donation_sanitize_settings($input) {
    $sanitized = array();
    
    $sanitized['sandbox_mode'] = isset($input['sandbox_mode']) ? true : false;
    $sanitized['sandbox_key'] = sanitize_text_field($input['sandbox_key']);
    $sanitized['production_key'] = sanitize_text_field($input['production_key']);
    $sanitized['redirect_url'] = esc_url_raw($input['redirect_url']);
    $sanitized['webhook_url'] = esc_url_raw($input['webhook_url']);
    
    return $sanitized;
}

/**
 * Enqueue admin styles
 */
function sola_donation_admin_styles($hook) {
    if ($hook !== 'toplevel_page_sola-donation-settings') {
        return;
    }
    
    wp_enqueue_style(
        'sola-donation-admin',
        SOLA_DONATION_PLUGIN_URL . 'admin/admin-styles.css',
        array(),
        SOLA_DONATION_VERSION
    );
}
add_action('admin_enqueue_scripts', 'sola_donation_admin_styles');

/**
 * Enqueue frontend styles and scripts
 */
function sola_donation_enqueue_assets() {
    wp_enqueue_style(
        'sola-donation-form',
        SOLA_DONATION_PLUGIN_URL . 'public/form-styles.css',
        array(),
        SOLA_DONATION_VERSION
    );
    
    wp_enqueue_script(
        'sola-donation-form',
        SOLA_DONATION_PLUGIN_URL . 'public/form-script.js',
        array('jquery'),
        SOLA_DONATION_VERSION,
        true
    );
    
    // Localize script with AJAX URL and nonce
    wp_localize_script('sola-donation-form', 'solaDonation', array(
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('sola_donation_nonce'),
        'pluginUrl' => SOLA_DONATION_PLUGIN_URL
    ));
}
add_action('wp_enqueue_scripts', 'sola_donation_enqueue_assets');

/**
 * Register shortcode
 */
function sola_donation_form_shortcode($atts) {
    ob_start();
    require SOLA_DONATION_PLUGIN_DIR . 'public/form-template.php';
    return ob_get_clean();
}
add_shortcode('sola_donation_form', 'sola_donation_form_shortcode');

/**
 * AJAX handler for form submission
 */
function sola_donation_process_form() {
    // Verify nonce
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'sola_donation_nonce')) {
        wp_send_json_error(array('message' => 'Security check failed'));
        return;
    }
    
    // Include API handler
    require_once SOLA_DONATION_PLUGIN_DIR . 'includes/api-handler.php';
    
    // Get form data
    $form_data = array(
        'firstName' => sanitize_text_field($_POST['firstName']),
        'lastName' => sanitize_text_field($_POST['lastName']),
        'phone' => sanitize_text_field($_POST['phone']),
        'email' => sanitize_email($_POST['email']),
        'address' => sanitize_text_field($_POST['address']),
        'currency' => sanitize_text_field($_POST['currency']),
        'donationType' => sanitize_text_field($_POST['donationType']),
        'amount' => floatval($_POST['amount']),
        'chargeDay' => isset($_POST['chargeDay']) ? intval($_POST['chargeDay']) : null,
        'chargeNow' => isset($_POST['chargeNow']) ? (bool)$_POST['chargeNow'] : false,
        'cardNumber' => sanitize_text_field($_POST['cardNumber']),
        'expiry' => sanitize_text_field($_POST['expiry']),
        'cvv' => sanitize_text_field($_POST['cvv'])
    );
    
    // Process payment
    $result = sola_donation_process_payment($form_data);
    
    if ($result['success']) {
        // Send webhook if configured
        $settings = get_option('sola_donation_settings');
        if (!empty($settings['webhook_url'])) {
            require_once SOLA_DONATION_PLUGIN_DIR . 'includes/webhook-handler.php';
            sola_donation_send_webhook($settings['webhook_url'], $result['data'], $form_data);
        }
        
        wp_send_json_success(array(
            'message' => $result['message'],
            'redirectUrl' => !empty($settings['redirect_url']) ? $settings['redirect_url'] : ''
        ));
    } else {
        wp_send_json_error(array('message' => $result['message']));
    }
}
add_action('wp_ajax_sola_donation_process', 'sola_donation_process_form');
add_action('wp_ajax_nopriv_sola_donation_process', 'sola_donation_process_form');

/**
 * Load translations
 */
function sola_donation_load_textdomain() {
    load_plugin_textdomain('sola-donation', false, dirname(plugin_basename(__FILE__)) . '/languages');
}
add_action('plugins_loaded', 'sola_donation_load_textdomain');
