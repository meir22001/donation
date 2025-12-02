<?php
/**
 * Sola Payments API Handler
 * Processes payments through Sola Payments Gateway
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Process payment through Sola Payments
 *
 * @param array $form_data Form data from frontend
 * @return array Result with success status and message
 */
function sola_donation_process_payment($form_data) {
    // Get settings
    $settings = get_option('sola_donation_settings');
    
    // Determine which API key to use
    $is_sandbox = isset($settings['sandbox_mode']) && $settings['sandbox_mode'];
    $api_key = $is_sandbox ? $settings['sandbox_key'] : $settings['production_key'];
    
    // Validate API key
    if (empty($api_key)) {
        return array(
            'success' => false,
            'message' => 'API key not configured. Please check plugin settings.'
        );
    }
    
    // Prepare API request
    $api_url = 'https://x1.cardknox.com/gatewayjson';
    
    // Format expiry date (MMYY)
    $expiry = $form_data['expiry']; // Already formatted as MMYY from JS
    
    // Determine command based on donation type
    if ($form_data['donationType'] === 'monthly') {
        // For recurring payments, we'll use a different approach
        $result = sola_donation_setup_recurring($form_data, $api_key, $is_sandbox);
    } else {
        // One-time payment
        $result = sola_donation_process_one_time($form_data, $api_key, $is_sandbox);
    }
    
    return $result;
}

/**
 * Process one-time donation
 *
 * @param array $form_data Form data
 * @param string $api_key Sola API key
 * @param bool $is_sandbox Sandbox mode flag
 * @return array Result
 */
function sola_donation_process_one_time($form_data, $api_key, $is_sandbox) {
    $api_url = 'https://x1.cardknox.com/gatewayjson';
    
    // Prepare request data
    $request_data = array(
        'xKey' => $api_key,
        'xVersion' => '5.0.0',
        'xSoftwareName' => 'Sola Donation Plugin',
        'xSoftwareVersion' => SOLA_DONATION_VERSION,
        'xCommand' => 'cc:Sale',
        'xAmount' => number_format($form_data['amount'], 2, '.', ''),
        'xCardNum' => $form_data['cardNumber'],
        'xExp' => $form_data['expiry'],
        'xCVV' => $form_data['cvv'],
        'xBillFirstName' => $form_data['firstName'],
        'xBillLastName' => $form_data['lastName'],
        'xEmail' => $form_data['email'],
        'xBillPhone' => $form_data['phone'],
        'xBillStreet' => $form_data['address'],
        'xCurrency' => $form_data['currency'],
        'xInvoice' => 'DONATION-' . time() . '-' . rand(1000, 9999),
        'xDescription' => 'One-time donation',
        'xAllowDuplicate' => 'false'
    );
    
    // Log request (without sensitive data)
    sola_donation_log('One-time payment request', array(
        'amount' => $request_data['xAmount'],
        'currency' => $request_data['xCurrency'],
        'invoice' => $request_data['xInvoice'],
        'email' => $form_data['email'],
        'sandbox' => $is_sandbox
    ));
    
    // Make API request
    $response = wp_remote_post($api_url, array(
        'body' => $request_data,
        'timeout' => 30,
        'headers' => array(
            'Content-Type' => 'application/x-www-form-urlencoded'
        )
    ));
    
    // Check for errors
    if (is_wp_error($response)) {
        sola_donation_log('API request failed', array('error' => $response->get_error_message()));
        return array(
            'success' => false,
            'message' => 'Payment gateway connection failed. Please try again.'
        );
    }
    
    // Parse response
    $body = wp_remote_retrieve_body($response);
    $result = json_decode($body, true);
    
    // Log response
    sola_donation_log('API response received', array(
        'xResult' => isset($result['xResult']) ? $result['xResult'] : 'unknown',
        'xRefNum' => isset($result['xRefNum']) ? $result['xRefNum'] : 'none'
    ));
    
    // Check result
    if (isset($result['xResult']) && $result['xResult'] === 'A') {
        // Approved
        return array(
            'success' => true,
            'message' => 'Payment successful! Transaction #' . $result['xRefNum'],
            'data' => array(
                'refNum' => $result['xRefNum'],
                'authAmount' => isset($result['xAuthAmount']) ? $result['xAuthAmount'] : $form_data['amount'],
                'authCode' => isset($result['xAuthCode']) ? $result['xAuthCode'] : '',
                'maskedCard' => isset($result['xMaskedCardNumber']) ? $result['xMaskedCardNumber'] : '',
                'cardType' => isset($result['xCardType']) ? $result['xCardType'] : '',
                'formData' => $form_data
            )
        );
    } else {
        // Declined or Error
        $error_message = isset($result['xError']) ? $result['xError'] : 'Payment was declined. Please check your card details and try again.';
        
        sola_donation_log('Payment declined', array(
            'xResult' => isset($result['xResult']) ? $result['xResult'] : 'unknown',
            'xError' => $error_message
        ));
        
        return array(
            'success' => false,
            'message' => $error_message
        );
    }
}

/**
 * Setup recurring donation
 *
 * @param array $form_data Form data
 * @param string $api_key Sola API key
 * @param bool $is_sandbox Sandbox mode flag
 * @return array Result
 */
function sola_donation_setup_recurring($form_data, $api_key, $is_sandbox) {
    $api_url = 'https://x1.cardknox.com/gatewayjson';
    
    // First, save the card as a token
    $token_request = array(
        'xKey' => $api_key,
        'xVersion' => '5.0.0',
        'xSoftwareName' => 'Sola Donation Plugin',
        'xSoftwareVersion' => SOLA_DONATION_VERSION,
        'xCommand' => 'cc:Save',
        'xCardNum' => $form_data['cardNumber'],
        'xExp' => $form_data['expiry'],
        'xCVV' => $form_data['cvv'],
        'xBillFirstName' => $form_data['firstName'],
        'xBillLastName' => $form_data['lastName'],
        'xEmail' => $form_data['email'],
        'xBillPhone' => $form_data['phone'],
        'xBillStreet' => $form_data['address']
    );
    
    sola_donation_log('Saving card token for recurring', array(
        'email' => $form_data['email']
    ));
    
    $token_response = wp_remote_post($api_url, array(
        'body' => $token_request,
        'timeout' => 30,
        'headers' => array(
            'Content-Type' => 'application/x-www-form-urlencoded'
        )
    ));
    
    if (is_wp_error($token_response)) {
        return array(
            'success' => false,
            'message' => 'Failed to setup recurring donation. Please try again.'
        );
    }
    
    $token_body = wp_remote_retrieve_body($token_response);
    $token_result = json_decode($token_body, true);
    
    if (!isset($token_result['xToken']) || empty($token_result['xToken'])) {
        sola_donation_log('Token creation failed', $token_result);
        return array(
            'success' => false,
            'message' => 'Failed to save payment method. Please try again.'
        );
    }
    
    $token = $token_result['xToken'];
    
    // If chargeNow is true, process the first payment
    if (isset($form_data['chargeNow']) && $form_data['chargeNow']) {
        $first_payment_request = array(
            'xKey' => $api_key,
            'xVersion' => '5.0.0',
            'xSoftwareName' => 'Sola Donation Plugin',
            'xSoftwareVersion' => SOLA_DONATION_VERSION,
            'xCommand' => 'cc:Sale',
            'xAmount' => number_format($form_data['amount'], 2, '.', ''),
            'xToken' => $token,
            'xCurrency' => $form_data['currency'],
            'xInvoice' => 'DONATION-RECURRING-' . time() . '-' . rand(1000, 9999),
            'xDescription' => 'Recurring donation - first payment'
        );
        
        $first_payment_response = wp_remote_post($api_url, array(
            'body' => $first_payment_request,
            'timeout' => 30,
            'headers' => array(
                'Content-Type' => 'application/x-www-form-urlencoded'
            )
        ));
        
        if (!is_wp_error($first_payment_response)) {
            $first_payment_body = wp_remote_retrieve_body($first_payment_response);
            $first_payment_result = json_decode($first_payment_body, true);
            
            if (isset($first_payment_result['xResult']) && $first_payment_result['xResult'] !== 'A') {
                $error_message = isset($first_payment_result['xError']) ? $first_payment_result['xError'] : 'First payment failed.';
                return array(
                    'success' => false,
                    'message' => $error_message
                );
            }
        }
    }
    
    // Store recurring donation info in WordPress
    $recurring_data = array(
        'token' => $token,
        'amount' => $form_data['amount'],
        'currency' => $form_data['currency'],
        'charge_day' => $form_data['chargeDay'],
        'donor_email' => $form_data['email'],
        'donor_name' => $form_data['firstName'] . ' ' . $form_data['lastName'],
        'created_at' => current_time('mysql'),
        'status' => 'active'
    );
    
    // Save to custom table or post meta (you may want to create a custom post type for this)
    sola_donation_save_recurring_subscription($recurring_data);
    
    sola_donation_log('Recurring donation setup complete', array(
        'email' => $form_data['email'],
        'amount' => $form_data['amount'],
        'charge_day' => $form_data['chargeDay']
    ));
    
    return array(
        'success' => true,
        'message' => 'Recurring donation setup successful! You will be charged on day ' . $form_data['chargeDay'] . ' of each month.',
        'data' => array(
            'recurring' => true,
            'token' => $token,
            'formData' => $form_data
        )
    );
}

/**
 * Save recurring subscription data
 *
 * @param array $data Subscription data
 */
function sola_donation_save_recurring_subscription($data) {
    // For now, save as a custom post type
    $post_id = wp_insert_post(array(
        'post_type' => 'sola_recurring_donation',
        'post_title' => 'Recurring Donation - ' . $data['donor_name'],
        'post_status' => 'publish',
        'meta_input' => array(
            'sola_token' => $data['token'],
            'sola_amount' => $data['amount'],
            'sola_currency' => $data['currency'],
            'sola_charge_day' => $data['charge_day'],
            'sola_donor_email' => $data['donor_email'],
            'sola_donor_name' => $data['donor_name'],
            'sola_status' => $data['status']
        )
    ));
    
    return $post_id;
}

/**
 * Log donation activity
 *
 * @param string $message Log message
 * @param array $data Additional data
 */
function sola_donation_log($message, $data = array()) {
    if (defined('WP_DEBUG') && WP_DEBUG) {
        error_log('[Sola Donation] ' . $message . ' | Data: ' . print_r($data, true));
    }
}

// Register custom post type for recurring donations
function sola_donation_register_cpt() {
    register_post_type('sola_recurring_donation', array(
        'labels' => array(
            'name' => 'Recurring Donations',
            'singular_name' => 'Recurring Donation'
        ),
        'public' => false,
        'show_ui' => true,
        'show_in_menu' => 'sola-donation-settings',
        'capability_type' => 'post',
        'supports' => array('title'),
        'menu_icon' => 'dashicons-heart'
    ));
}
add_action('init', 'sola_donation_register_cpt');
