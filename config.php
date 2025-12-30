<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "blog");
if (!$conn) die("Kết nối thất bại");

function getImagePath($image_url) {
    if (empty($image_url)) {
        return 'assets/default-post.jpg';
    }
    
    // Check if it's a local image (starts with assets/ or doesn't have http/https)
    if (strpos($image_url, 'assets/') === 0 || !preg_match('/^(http|https):\/\//', $image_url)) {
        // Remove assets/ prefix if present for checking
        $filename = str_replace('assets/', '', $image_url);
        $local_path = 'assets/' . $filename;
        
        if (file_exists($local_path)) {
            return $local_path;
        } else {
            return 'assets/default-post.jpg';
        }
    }
    
    return $image_url; // External URL
}

function isLocalImage($image_url) {
    if (empty($image_url)) return false;
    return strpos($image_url, 'assets/') === 0 || !preg_match('/^(http|https):\/\//', $image_url);
}
?>