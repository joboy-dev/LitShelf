<?php
    // Determine which page to load based on the URL
    $path = $_SERVER['REQUEST_URI'];

    echo $path;

    if ($path === '/LitShelf/signup') {
        include 'frontend/html/signup.php';
        exit;
    } else if ($path === "/" || $path === "") {
        include 'frontend/html/home.php';
        exit;
    } else {
        echo "<h1>Page not Found</h1>";
        exit;
    }
?>