<?php

class Sigma_Security_OTP_Page {

    public function run() {
        add_action('template_redirect', array($this, 'handle_otp_page'));
        add_filter('show_admin_bar', '__return_false'); // Hide admin bar on OTP page
    }

    public function handle_otp_page() {
        if (is_page('otp-page')) { // Ensure this matches your OTP page slug
            if (isset($_POST['otp'])) {
                $this->validate_otp();
            }

            include(plugin_dir_path(__FILE__) . '../templates/otp-page.php'); // Load the OTP page template
            exit;
        }
    }

    private function validate_otp() {
        $user_otp = sanitize_text_field($_POST['otp']);
        $user = wp_get_current_user();
        $stored_otp = get_user_meta($user->ID, '_admin_login_otp', true);

        if ($user_otp === $stored_otp) {
            delete_user_meta($user->ID, '_admin_login_otp'); // Clear OTP after validation
            wp_set_current_user($user->ID); // Set the current user
            wp_set_auth_cookie($user->ID); // Set the authentication cookie
            do_action('wp_login', $user->user_login, $user); // Fire the wp_login action
            wp_redirect(admin_url()); // Redirect to the admin area
            exit;
        } else {
            $message = 'Invalid OTP. Please try again.';
            add_filter('otp_validation_error', function() use ($message) {
                return $message;
            });
        }
    }
}