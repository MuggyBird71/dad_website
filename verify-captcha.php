session_start();

// Check if the CAPTCHA input matches the stored CAPTCHA text
if ($_POST['captchaInput'] == $_SESSION['captcha']) {
    echo "CAPTCHA validation successful!";
    // Proceed with form processing
} else {
    echo "CAPTCHA validation failed. Please try again.";
}
