<?php
    // Determine which page to load based on the URL
    $path = $_SERVER['REQUEST_URI'];

    echo $path;

    if ($path === '/LitShelf/signup') {
        include 'frontend/html/signup.php';
    } else {
        include 'frontend/html/home.php';
    }
?>