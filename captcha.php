if (isset($_POST['submit'])) {
    // Your secret key
    $secretKey = "6LeNrp4pAAAAAIVjBAdDb4ISw3CB-Hq1iaZCaYvU";
    // The response from reCAPTCHA
    $captchaResponse = $_POST['g-recaptcha-response'];

    // Verifying the reCAPTCHA response
    $verifyUrl = "https://www.google.com/recaptcha/api/siteverify";
    $verifyResponse = file_get_contents($verifyUrl . "?secret=" . $secretKey . "&response=" . $captchaResponse);
    $responseData = json_decode($verifyResponse);

    if ($responseData->success) {
        // reCAPTCHA validation successful
        // Proceed with the rest of your form processing
    } else {
        // reCAPTCHA validation failed
        // Handle the failure according to your application's needs
    }
}
