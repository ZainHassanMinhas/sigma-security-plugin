# Sigma Security - WordPress OTP Verification Plugin

## Description

Sigma Security is a robust WordPress plugin that enhances the security of your WordPress site by adding One-Time Password (OTP) verification to the admin login process. This innovative solution provides an extra layer of protection against unauthorized access, ensuring that only legitimate users can log in to your WordPress admin panel.

**Note**: This plugin is developed by Zain Minhas and is designed for users at the beginner to intermediate level in WordPress development. It serves as an excellent example of implementing security features within WordPress.

## Key Features

- **OTP Verification**: Adds an extra layer of security to the admin login process by requiring an OTP.
- **OTP Generation**: Generates a random 6-digit OTP for each login attempt using a secure algorithm.
- **OTP Email Sending**: Sends the generated OTP to the user's registered email address instantly.
- **OTP Validation**: Validates the entered OTP against the stored OTP for the user, ensuring a seamless and secure login process.
- **Settings Page**: Allows site administrators to easily enable or disable the OTP feature from the plugin settings page.
- **Test OTP Functionality**: Provides a convenient test OTP feature that enables users to send a test OTP and validate it, ensuring the plugin is configured correctly.

## Installation

1. Upload the `sigma-security` folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Configure the settings if necessary by navigating to the 'Sigma Security' menu in the WordPress admin panel.

## Usage

1. When a user attempts to log in to the WordPress admin panel, they will receive an OTP via email to their registered address.
2. The user must enter the received OTP in the designated input field on the login page.
3. Upon successful validation of the OTP, the user will be securely logged in to the WordPress admin panel.

## Test OTP

The plugin's test OTP functionality allows users to conveniently send a test OTP and validate it. To use this feature:

1. Navigate to the 'Sigma Security' menu in the WordPress admin panel.
2. Click on the 'Send Test OTP' button to receive a test OTP via email.
3. Enter the received test OTP in the input field and click 'Validate OTP' to test the plugin's functionality.

## Contributing

Contributions to the Sigma Security plugin are welcome and encouraged. If you find any issues or have suggestions for improvements, please create an issue on the plugin's GitHub repository. Your feedback and contributions help make the plugin better for the entire WordPress community.

## Author

- **Zain Minhas** - Full-Stack Developer with a passion for creating secure and user-friendly WordPress solutions.

## License

This project is licensed under the [GPL-2.0 License](LICENSE), ensuring that it remains open-source and accessible to the WordPress community.
