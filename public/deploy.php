<?php
// deploy.php - Secure auto-extraction webhook for Starconnect cPanel deployment

header('Content-Type: application/json');

// 1. Read DEPLOY_KEY from .env file
$envPath = dirname(__DIR__) . '/.env';
$deployKey = null;

if (file_exists($envPath)) {
    $lines = file($envPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        $line = trim($line);
        if (empty($line) || $line[0] === '#') {
            continue;
        }
        if (strpos($line, '=') !== false) {
            list($key, $value) = explode('=', $line, 2);
            if (trim($key) === 'DEPLOY_KEY') {
                $deployKey = trim($value, " \t\n\r\0\x0B\"'");
                break;
            }
        }
    }
}

// Fallback default key to make initial setup easy
if (empty($deployKey)) {
    $deployKey = "starconnect_default_deploy_token_2026";
}

$inputKey = isset($_GET['key']) ? $_GET['key'] : '';

if (empty($inputKey) || $inputKey !== $deployKey) {
    header('HTTP/1.0 403 Forbidden');
    echo json_encode(['status' => 'error', 'message' => 'Unauthorized key']);
    exit;
}

$zipFile = dirname(__DIR__) . '/starconnect_final.zip';

if (!file_exists($zipFile)) {
    echo json_encode(['status' => 'error', 'message' => 'ZIP file not found.']);
    exit;
}

$zip = new ZipArchive;
$res = $zip->open($zipFile);

if ($res === TRUE) {
    $extractPath = dirname(__DIR__);
    $zip->extractTo($extractPath);
    $zip->close();
    
    // Delete the zip file
    unlink($zipFile);
    
    // Clear OPcache if enabled
    if (function_exists('opcache_reset')) {
        opcache_reset();
    }
    
    echo json_encode(['status' => 'success', 'message' => 'Deployment success! All files extracted.']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Failed to open ZIP file. Code: ' . $res]);
}
