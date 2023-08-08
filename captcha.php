<?php
session_start();

// Set the session cookie to expire in 60 seconds


// Generate captcha code
$random_num    = md5(random_bytes(64));
$captcha_code  = substr($random_num, 0, 6);

// Assign captcha in session
$_SESSION['CAPTCHA_CODE'] = $captcha_code;

// Create captcha image
$layer = imagecreatetruecolor(168, 37);

// Generate random background colors
$captcha_bg = imagecolorallocate($layer, mt_rand(200, 255), mt_rand(200, 255), mt_rand(200, 255));
imagefill($layer, 0, 0, $captcha_bg);

// Add random lines as noise
for ($i = 0; $i < 10; $i++) {
    $line_color = imagecolorallocate($layer, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
    imageline($layer, mt_rand(0, 168), mt_rand(0, 37), mt_rand(0, 168), mt_rand(0, 37), $line_color);
}

// Add random dots as noise
for ($i = 0; $i < 100; $i++) {
    $dot_color = imagecolorallocate($layer, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
    imagesetpixel($layer, mt_rand(0, 168), mt_rand(0, 37), $dot_color);
}

$captcha_text_color = imagecolorallocate($layer, 0, 0, 0);
imagestring($layer, 5, 55, 10, $captcha_code, $captcha_text_color);
header("Content-type: image/jpeg");
imagejpeg($layer);
?>