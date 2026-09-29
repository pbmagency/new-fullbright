<?php

$publicPath = __DIR__.'/public';

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? ''
);

$filePath = $publicPath.$uri;

// Serve static assets with pre-compressed Brotli / Gzip if available
if ($uri !== '/' && file_exists($filePath) && !is_dir($filePath)) {
    $acceptEncoding = $_SERVER['HTTP_ACCEPT_ENCODING'] ?? '';
    $ext = pathinfo($filePath, PATHINFO_EXTENSION);
    $compressible = [
        'css'  => 'text/css',
        'js'   => 'application/javascript',
        'json' => 'application/json',
        'svg'  => 'image/svg+xml',
    ];

    if (isset($compressible[$ext])) {
        $mime = $compressible[$ext];

        if (str_contains($acceptEncoding, 'br') && file_exists($filePath.'.br')) {
            header("Content-Type: {$mime}; charset=utf-8");
            header('Content-Encoding: br');
            header('Vary: Accept-Encoding');
            header('Cache-Control: public, max-age=31536000, immutable');
            readfile($filePath.'.br');
            exit;
        }

        if (str_contains($acceptEncoding, 'gzip') && file_exists($filePath.'.gz')) {
            header("Content-Type: {$mime}; charset=utf-8");
            header('Content-Encoding: gzip');
            header('Vary: Accept-Encoding');
            header('Cache-Control: public, max-age=31536000, immutable');
            readfile($filePath.'.gz');
            exit;
        }

        header("Content-Type: {$mime}; charset=utf-8");
        header('Cache-Control: public, max-age=31536000, immutable');
        readfile($filePath);
        exit;
    }

    return false;
}

require_once $publicPath.'/index.php';
