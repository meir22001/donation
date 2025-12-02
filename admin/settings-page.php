<?php
/**
 * Settings Page Template
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

$settings = get_option('sola_donation_settings');

// Check for API validation result
$api_validation = get_transient('sola_donation_api_validation');
if ($api_validation !== false) {
    delete_transient('sola_donation_api_validation');
}

$sandbox_mode = isset($settings['sandbox_mode']) ? $settings['sandbox_mode'] : true;
$sandbox_key = isset($settings['sandbox_key']) ? $settings['sandbox_key'] : '';
$production_key = isset($settings['production_key']) ? $settings['production_key'] : '';
$redirect_url = isset($settings['redirect_url']) ? $settings['redirect_url'] : '';
$webhook_url = isset($settings['webhook_url']) ? $settings['webhook_url'] : '';

// Handle form submission
if (isset($_POST['sola_donation_save'])) {
    check_admin_referer('sola_donation_settings_nonce');
    
    $new_settings = array(
        'sandbox_mode' => isset($_POST['sandbox_mode']) ? true : false,
        'sandbox_key' => sanitize_text_field($_POST['sandbox_key']),
        'production_key' => sanitize_text_field($_POST['production_key']),
        'redirect_url' => esc_url_raw($_POST['redirect_url']),
        'webhook_url' => esc_url_raw($_POST['webhook_url'])
    );
    
    update_option('sola_donation_settings', $new_settings);
    
    echo '<div class="notice notice-success is-dismissible"><p>' . __('Settings saved successfully!', 'sola-donation') . '</p></div>';
    
    // Update local variables
    $settings = $new_settings;
    $sandbox_mode = $settings['sandbox_mode'];
    $sandbox_key = $settings['sandbox_key'];
    $production_key = $settings['production_key'];
    $redirect_url = $settings['redirect_url'];
    $webhook_url = $settings['webhook_url'];
}
?>

<div class="wrap sola-donation-settings">
    <h1><?php echo esc_html__('Sola Donation Settings', 'sola-donation'); ?></h1>
    
    <?php if ($api_validation): ?>
        <?php if ($api_validation['success']): ?>
            <div class="notice notice-success is-dismissible">
                <p><strong><?php echo esc_html__('Success!', 'sola-donation'); ?></strong> <?php echo esc_html($api_validation['message']); ?></p>
            </div>
        <?php else: ?>
            <div class="notice notice-error is-dismissible">
                <p><strong><?php echo esc_html__('Error!', 'sola-donation'); ?></strong> <?php echo esc_html($api_validation['message']); ?></p>
            </div>
        <?php endif; ?>
    <?php endif; ?>
    
    <form method="post" action="">
        <?php wp_nonce_field('sola_donation_settings_nonce'); ?>
        
        <!-- API Configuration -->
        <div class="sola-settings-section">
            <h2><?php echo esc_html__('API Configuration', 'sola-donation'); ?></h2>
            <p class="description">
                <?php echo esc_html__('Enter your Sola Payments API keys. You can get these from your Sola Payments account.', 'sola-donation'); ?>
                <a href="https://solapayments.com/devsdk/" target="_blank"><?php echo esc_html__('Get Sandbox Key', 'sola-donation'); ?></a>
            </p>
            
            <table class="form-table">
                <tr>
                    <th scope="row">
                        <label for="sandbox_mode"><?php echo esc_html__('Sandbox Mode', 'sola-donation'); ?></label>
                    </th>
                    <td>
                        <label class="sola-toggle">
                            <input type="checkbox" name="sandbox_mode" id="sandbox_mode" value="1" <?php checked($sandbox_mode, true); ?>>
                            <span class="sola-toggle-slider"></span>
                        </label>
                        <p class="description">
                            <?php echo esc_html__('Enable this to use sandbox/test mode. Disable for live transactions.', 'sola-donation'); ?>
                        </p>
                    </td>
                </tr>
                
                <tr>
                    <th scope="row">
                        <label for="sandbox_key"><?php echo esc_html__('Sandbox xKey', 'sola-donation'); ?></label>
                    </th>
                    <td>
                        <input type="text" 
                               name="sandbox_key" 
                               id="sandbox_key" 
                               value="<?php echo esc_attr($sandbox_key); ?>" 
                               class="regular-text"
                               placeholder="<?php echo esc_attr__('Enter sandbox xKey', 'sola-donation'); ?>">
                        <p class="description">
                            <?php echo esc_html__('Your Sola Payments sandbox API key for testing.', 'sola-donation'); ?>
                        </p>
                    </td>
                </tr>
                
                <tr>
                    <th scope="row">
                        <label for="production_key"><?php echo esc_html__('Production xKey', 'sola-donation'); ?></label>
                    </th>
                    <td>
                        <input type="text" 
                               name="production_key" 
                               id="production_key" 
                               value="<?php echo esc_attr($production_key); ?>" 
                               class="regular-text"
                               placeholder="<?php echo esc_attr__('Enter production xKey', 'sola-donation'); ?>">
                        <p class="description">
                            <?php echo esc_html__('Your Sola Payments production API key for live transactions.', 'sola-donation'); ?>
                        </p>
                    </td>
                </tr>
            </table>
        </div>
        
        <!-- Post-Submission Actions -->
        <div class="sola-settings-section">
            <h2><?php echo esc_html__('Post-Submission Actions', 'sola-donation'); ?></h2>
            <p class="description">
                <?php echo esc_html__('Configure what happens after a successful donation.', 'sola-donation'); ?>
            </p>
            
            <table class="form-table">
                <tr>
                    <th scope="row">
                        <label for="redirect_url"><?php echo esc_html__('Redirect URL', 'sola-donation'); ?></label>
                    </th>
                    <td>
                        <input type="url" 
                               name="redirect_url" 
                               id="redirect_url" 
                               value="<?php echo esc_attr($redirect_url); ?>" 
                               class="regular-text"
                               placeholder="<?php echo esc_attr__('https://example.com/thank-you', 'sola-donation'); ?>">
                        <p class="description">
                            <?php echo esc_html__('URL to redirect users after successful donation (optional).', 'sola-donation'); ?>
                        </p>
                    </td>
                </tr>
                
                <tr>
                    <th scope="row">
                        <label for="webhook_url"><?php echo esc_html__('Webhook URL', 'sola-donation'); ?></label>
                    </th>
                    <td>
                        <input type="url" 
                               name="webhook_url" 
                               id="webhook_url" 
                               value="<?php echo esc_attr($webhook_url); ?>" 
                               class="regular-text"
                               placeholder="<?php echo esc_attr__('https://example.com/webhook', 'sola-donation'); ?>">
                        <p class="description">
                            <?php echo esc_html__('URL to send transaction data after successful donation (optional).', 'sola-donation'); ?>
                        </p>
                    </td>
                </tr>
            </table>
        </div>
        
        <!-- Save Button -->
        <p class="submit">
            <button type="submit" name="sola_donation_save" class="button button-primary button-large">
                <?php echo esc_html__('Save Settings', 'sola-donation'); ?>
            </button>
        </p>
    </form>
    
    <!-- Shortcode Instructions -->
    <div class="sola-settings-section sola-shortcode-info">
        <h2><?php echo esc_html__('How to Use', 'sola-donation'); ?></h2>
        <p><?php echo esc_html__('Add the donation form to any page or post using this shortcode:', 'sola-donation'); ?></p>
        <div class="sola-shortcode-box">
            <code>[sola_donation_form]</code>
            <button class="button button-small sola-copy-shortcode" onclick="navigator.clipboard.writeText('[sola_donation_form]')">
                <?php echo esc_html__('Copy', 'sola-donation'); ?>
            </button>
        </div>
    </div>
</div>
