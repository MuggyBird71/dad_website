session_start();

// Generate a random CAPTCHA text
$captchaText = substr(str_shuffle("ABCDEFGHJKLMNPQRSTUVWXYZ23456789"), 0, 5);

// Store the CAPTCHA text in a session variable
$_SESSION['captcha'] = $captchaText;

// Create an image from a blank canvas
$image = imagecreatetruecolor(120, 30);

// Allocate colors
$bgColor = imagecolorallocate($image, 255, 255, 255); // White background
$textColor = imagecolorallocate($image, 0, 0, 0); // Black text

// Fill the background
imagefilledrectangle($image, 0, 0, 120, 30, $bgColor);

// Add the text
imagettftext($image, 20, 0, 10, 25, $textColor, '/index.html/NotoSerif-Regular.ttf', $captchaText);

// Tell the browser that this is an image
header('Content-Type: image/jpeg');

// Output the image as JPEG
imagejpeg($image);

// Free up resources
imagedestroy($image);
