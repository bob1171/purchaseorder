<?php

$requestUri = $_SERVER['REQUEST_URI'];

if (preg_match('/\.(js|css|ico)$/', $requestUri)) {

    $filePath = __DIR__ . "/../public" . $requestUri;

    if (file_exists($filePath)) {

        switch (substr($requestUri, strrpos($requestUri, '.') + 1)) {
            case 'js':
                $contentType = 'application/javascript';
                break;
            case 'css':
                $contentType = 'text/css';
                break;
            case 'ico':
                $contentType = 'image/x-icon';
                break;
        }
        header('Content-Type: ' . $contentType);

        readfile($filePath);
        exit;
    }
}

require __DIR__ . '/../public/index.php';