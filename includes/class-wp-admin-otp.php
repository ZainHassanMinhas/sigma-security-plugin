<?php

class WP_Admin_OTP {

    private $otp_enabled;

    // Constructor
    public function __construct() {
        // Get the option for enabling OTP
        $this->otp_enabled = get_option('sigma_security_otp_enabled', true);
    }

    // Initialize the plugin
    public function run() {
        // Hook into WordPress actions
        add_action('wp_login', array($this, 'send_otp_email'), 10, 2);
        add_action('login_redirect', array($this, 'redirect_to_otp_page'), 10, 3);
        add_action('admin_menu', array($this, 'add_admin_menu'));
        add_action('admin_init', array($this, 'register_settings'));
        add_action('wp_enqueue_scripts', array($this, 'enqueue_styles')); // Enqueue styles for both admin and OTP page
    }

    // Add Admin Menu
    public function add_admin_menu() {
        add_menu_page(
            'Sigma Security',
            'Sigma Security',
            'manage_options',
            'sigma-security',
            array($this, 'settings_page_content'),
            'dashicons-shield-alt',
            110
        );
    }

    // Register Settings
    public function register_settings() {
        register_setting('sigma_security_settings_group', 'sigma_security_otp_enabled');
    }

    // Enqueue styles for both admin and OTP page
    public function enqueue_styles() {
        // Enqueue CSS for the admin settings page
        if (is_admin() && isset($_GET['page']) && $_GET['page'] === 'sigma-security') {
            wp_enqueue_style('sigma-security-admin-styles', plugin_dir_url(__FILE__) . '../assets/css/styles.css');
        }

        // Enqueue CSS for the OTP page
        if (is_page('otp-page')) { // Ensure this matches your OTP page slug
            wp_enqueue_style('sigma-security-otp-styles', plugin_dir_url(__FILE__) . '../assets/css/styles.css');
        }
    }

    // Function to generate and send OTP during login
    public function send_otp_email($user_login, $user) {
        if ($this->otp_enabled) {
            // Generate a random OTP
            $otp = rand(100000, 999999);
            update_user_meta($user->ID, '_admin_login_otp', $otp);

            // Prepare email details
            $to = $user->user_email;
            $subject = 'Your Admin Login OTP';
            $message = "Your OTP for logging into the admin panel is: $otp";
            $headers = array('Content-Type: text/html; charset=UTF-8');

            // Send the OTP via email
            wp_mail($to, $subject, $message, $headers);
        }
    }

    // Redirect to OTP page after login
    public function redirect_to_otp_page($redirect_to, $request, $user) {
        if (isset($user->ID) && $this->otp_enabled) {
            return home_url('/otp-page/'); // Ensure this matches your OTP page slug
        }
        return $redirect_to;
    }

    // Settings page content
    public function settings_page_content() {
        ?>
        <div class="wrap sigma-security-plugin">
            <h1>Sigma Security Settings</h1>
            <form method="post" action="options.php">
                <?php settings_fields('sigma_security_settings_group'); ?>
                <?php do_settings_sections('sigma-security'); ?>
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row">Enable OTP</th>
                        <td>
                            <input type="checkbox" name="sigma_security_otp_enabled" value="1" <?php checked(1, get_option('sigma_security_otp_enabled', true), true); ?> />
                            <label for="sigma_security_otp_enabled">Enable sending OTP on admin login</label>
                        </td>
                    </tr>
                </table>
                <?php submit_button(); ?>
            </form>

            <h2>Test OTP Submission</h2>
            <form method="post" action="">
                <input type="submit" name="sigma_test_otp" class="button button-primary" value="Send Test OTP">
            </form>
            <?php
            // Handle Test OTP Submission
            if (isset($_POST['sigma_test_otp'])) {
                $this->handle_test_otp();
            }
            ?>
        </div>
        <?php
    }

    // Handle Test OTP
    private function handle_test_otp() {
        $current_user = wp_get_current_user();
        $otp = rand(100000, 999999);
        update_user_meta($current_user->ID, '_sigma_test_otp', $otp);

        // Send OTP to the logged-in user's email
        $to = $current_user->user_email;
        $subject = 'Your Sigma Security Test OTP';
        $message = "Your test OTP is: $otp";
        $headers = array('Content-Type: text/html; charset=UTF-8');

        if (wp_mail($to, $subject, $message, $headers)) {
            echo '<p>Test OTP sent to your email. Please enter it below:</p>';
            echo '<form method="post" action="" class="sigma-otp-container">
                    <input type="text" name="sigma_otp_entry" class="input" placeholder="Enter OTP" required>
                    <input type="submit" name="sigma_validate_test_otp" class="button button-primary" value="Validate OTP">
                  </form>';
        } else {
            echo '<p class="error-message">Failed to send Test OTP. Please check your email settings.</p>';
        }

        // Validate Test OTP
        if (isset($_POST['sigma_validate_test_otp'])) {
            $this->validate_test_otp();
        }
    }

    // Validate Test OTP
    private function validate_test_otp() {
        $user_otp = sanitize_text_field($_POST['sigma_otp_entry']);
        $stored_otp = get_user_meta(get_current_user_id(), '_sigma_test_otp', true);

        if ($user_otp === $stored_otp) {
            echo '<p class="success-message">Validation successful.</p>';
        } else {
            echo '<p class="error-message">Invalid OTP. Please try again.</p>';
        }
    }
}