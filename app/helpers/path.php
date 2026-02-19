<?php

if (!function_exists('base_path')) {
    function base_path($path = '') {
        return __DIR__ . '/..//' . ($path ? DIRECTORY_SEPARATOR . $path : $path);
    }
}

if (!function_exists('upload_image_path')) {
    function upload_image_path($path = '') {
        return base_path('../storage/upload/images/' . $path);
    }
}
