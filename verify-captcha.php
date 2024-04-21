<?php
// Ensure the token is received
if (isset($_POST['g-recaptcha-response'])) {
    $captchaResponse = $_POST['g-recaptcha-response'];

    // Your Secret Key
    $secretKey = 'YOUR_SECRET_KEY';

    // Prepare POST request to Google's reCAPTCHA Enterprise API
    $request = [
        'event' => [
            'token' => $captchaResponse,
            'expectedAction' => 'submit', // The action you expect, matching what's in the data-action attribute of your button
            'siteKey' => '6LfTqcEpAAAAAOEsgOIcyaXKhnML-hNxAnG0qvNp'
        ]
    ];

    // JSON encode the request
    $requestJSON = json_encode($request);

    // API URL
    $url = "https://recaptchaenterprise.googleapis.com/v1/projects/YOUR_PROJECT_ID/assessments?key=$secretKey";

    // Setup cURL
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $requestJSON);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Content-Length: ' . strlen($requestJSON)
    ]);

    // Execute the POST request
    $result = curl_exec($ch);
    curl_close($ch);

    // Decode the response
    $response = json_decode($result);

    // Check the success of the reCAPTCHA verification
    if ($response && $response->tokenProperties->valid && $response->riskAnalysis->score >= 0.5) {
        // Token is valid, and action matches
        // Here, handle your form submission logic
        echo "CAPTCHA verified successfully!";
    } else {
        // Verification failed
        echo "Failed to verify CAPTCHA.";
    }
} else {
    echo "No CAPTCHA token received.";
}
?>
