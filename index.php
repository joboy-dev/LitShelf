<?php
    session_start();

    include 'backend/utils/protect_route.php';

    // Determine which page to load based on the URL
    $path = $_SERVER['REQUEST_URI'];

    if ($path === '/signup') {
        include 'frontend/html/signup-page.php';
        exit;
    } else if ($path === "/login") {
        include 'frontend/html/login-page.php';
        exit;
    } else if ($path === "/logout") {
        // Protect route by checking if there is an active session
        protextRoute('backend/authentication/logout.php');
    } else if ($path === "/profile") {
        protextRoute('frontend/html/profile-page.php');
    } else if ($path === "/" || $path === "") {
        include 'frontend/html/home-page.php';
        exit;
    } else {
        echo "<h1>Page not Found</h1>";
        exit;
    }
?>
