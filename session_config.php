<?php
$en_https = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off';
session_set_cookie_params(
    [
    'lifetime' => 0,
    'path' => '/',
    'secure' => $en_https,
    'httponly' => true,
    'samesite' => 'Strict',
    ]
);
header("X-Frame-Options: DENY");
header("X-Content-Type-Options: nosniff");
header("Referrer-Policy: strict-origin-when-cross-origin");