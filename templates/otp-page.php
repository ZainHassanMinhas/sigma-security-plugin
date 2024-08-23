<?php
/**
 * Template for the OTP validation page.
 */
?>

<div class="wrap sigma-security-plugin" style="padding: 26px 24px;
    font-weight: 400;
    overflow: hidden;
    background: #fff;
    border: 1px solid #c3c4c7;
    box-shadow: 0 1px 3px rgba(0, 0, 0, .04);
    display: table;
    margin: 300px auto;
    border-radius: 10px;"> <!-- Added plugin-specific class -->
    <div class="sigma-otp-container">
        <h1 style="text-align: center;font-family: math;color: #2271b1;">Enter Your OTP</h1>
        <?php if (has_filter('otp_validation_error')) : ?>
            <p style="color: red;"><?php echo esc_html(apply_filters('otp_validation_error', '')); ?></p>
        <?php endif; ?>
        <form method="post" action="">
            <input type="text" name="otp" class="input" style="padding:10px;" placeholder="Enter OTP" required>
            <input type="submit" class="button button-primary" value="Validate OTP" style="    background: #2271b1;
    border-color: #2271b1;
    color: #fff;
    text-decoration: none;
    text-shadow: none;
    padding: 10px;
    border-radius: 5px;
    border: none;">
        </form>
    </div>
</div>