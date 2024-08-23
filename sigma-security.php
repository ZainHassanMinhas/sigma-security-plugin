<?php
/**
 * Plugin Name: Sigma Security
 * Description: A security plugin for adding OTP verification on admin login.
 * Version: 1.0
 * Author: Zain Minhas
 * License: GPL2
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Include necessary class files
require_once(plugin_dir_path(__FILE__) . 'includes/class-wp-admin-otp.php');
require_once(plugin_dir_path(__FILE__) . 'includes/class-sigma-security-otp-page.php');

// Initialize the plugin
function sigma_security_init() {
    $wp_admin_otp = new WP_Admin_OTP();
    $wp_admin_otp->run();

    $otp_page = new Sigma_Security_OTP_Page();
    $otp_page->run();
}
add_action('plugins_loaded', 'sigma_security_init');