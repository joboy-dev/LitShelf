<?php
    session_start();

    include 'utils/protect_route.php';

    // Determine which page to load based on the URL
    $path = $_SERVER['REQUEST_URI'];

    // include 'utils/display_message.php';
    // displayMessage();

    if ($path === '/signup') {
        include 'frontend/html/forms/signup-page.php';
        exit;
    } else if ($path === "/login") {
        include 'frontend/html/forms/login-page.php';
        exit;
    } else if ($path === "/logout") {
        // Protect route by checking if there is an active session
        protectRoute('backend/user/logout.php');
    } else if ($path === "/profile") {
        protectRoute('frontend/html/profile-page.php');
    } else if ($path === "/edit-profile") {
        protectRoute('frontend/html/forms/edit-profile-page.php');
    } else if ($path === "/change-password") {
        protectRoute('frontend/html/forms/change-password-page.php');
    } else if ($path === "/" || $path === "") {
        include 'frontend/html/home-page.php';
        exit;
    } 
    // ADMIN PAGE
    else if ($path === "/admin") {
        include 'admin/index.php';
        exit;
    } else {
        echo "<h1>Page not Found</h1>";
        exit;
    }
?>
