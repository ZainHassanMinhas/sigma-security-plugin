Here's the README.txt file for your Sigma Security plugin:

=== Sigma Security ===
Contributors: Zain Minhas
Tags: security, otp, login
Requires at least: 5.0
Tested up to: 6.0
Stable tag: 1.0

A WordPress plugin that adds OTP verification to the admin login process to enhance security.

== Description ==
Sigma Security is a WordPress plugin that enhances the security of your WordPress site by adding One-Time Password (OTP) verification to the admin login process. When a user attempts to log in to the WordPress admin panel, they will receive an OTP via email. The user must enter the OTP to complete the login process.

The plugin provides the following key features:

- **OTP Verification**: Adds an extra layer of security to the admin login process by requiring an OTP.
- **OTP Generation**: Generates a random 6-digit OTP for each login attempt.
- **OTP Email Sending**: Sends the generated OTP to the user's registered email address.
- **OTP Validation**: Validates the entered OTP against the stored OTP for the user.
- **Settings Page**: Allows enabling or disabling the OTP feature from the plugin settings page.
- **Test OTP Functionality**: Provides a test OTP feature to send a test OTP and validate it.

== Installation ==
1. Upload the `sigma-security` folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Configure the settings if necessary by navigating to the 'Sigma Security' menu in the WordPress admin panel.

== Usage ==
1. When a user attempts to log in to the WordPress admin panel, they will receive an OTP via email.
2. The user must enter the received OTP in the OTP input field on the login page.
3. Upon successful validation of the OTP, the user will be logged in to the WordPress admin panel.

== Test OTP ==
The plugin provides a test OTP functionality to send a test OTP and validate it. To use this feature:

1. Navigate to the 'Sigma Security' menu in the WordPress admin panel.
2. Click on the 'Send Test OTP' button to receive a test OTP via email.
3. Enter the received test OTP in the input field and click 'Validate OTP'.

== Settings ==
The plugin settings can be accessed by navigating to the 'Sigma Security' menu in the WordPress admin panel. The following settings are available:

- **Enable OTP**: Allows enabling or disabling the OTP verification feature.

== Frequently Asked Questions ==
= How does OTP verification work? =
When a user attempts to log in, they will receive a One-Time Password (OTP) via their registered email. The user must enter the received OTP to complete the login process.

= Can I disable the OTP verification? =
Yes, you can disable the OTP verification feature from the plugin settings page.

= What happens if I don't receive the OTP email? =
If you don't receive the OTP email, please check your email settings and spam folder. If the issue persists, you can use the test OTP functionality to send a test OTP.

== Changelog ==
= 1.0 =
* Initial release.

== Upgrade Notice ==
= 1.0 =
This is the initial release of the Sigma Security plugin.

== Contribution ==
Contributions to the Sigma Security plugin are welcome. If you find any issues or have suggestions for improvements, please create an issue on the plugin's GitHub repository.

== Author ==
- **Zain Minhas** - Full-Stack Developer

== License ==
This project is licensed under the [GPL-2.0 License](LICENSE).