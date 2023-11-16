<?php session_start(); ?>


<?php
    include_once 'utils/protect_route.php';
    // include_once 'utils/display_message.php';
    
    // displayMessage();
    
    // Determine which page to load based on the URL
    $path = $_SERVER['REQUEST_URI'];
    
    if ($path === '/signup') {
        include_once 'frontend/html/forms/signup-page.php';
        // include 'utils/display_message.php';
        exit;
    } else if ($path === "/login") {
        include_once 'frontend/html/forms/login-page.php';
        // include_once 'utils/display_message.php';
        exit;
    } else if ($path === "/logout") {
        // Protect route by checking if there is an active session
        // include_once 'utils/display_message.php';
        protectRoute('backend/user/logout.php');
    } else if ($path === "/profile") {
        // include 'utils/display_message.php';
        protectRoute('frontend/html/profile-page.php');
    } else if ($path === "/edit-profile") {
        // include 'utils/display_message.php';
        protectRoute('frontend/html/forms/edit-profile-page.php');
    } else if ($path === "/change-password") {
        // include 'utils/display_message.php';
        protectRoute('frontend/html/forms/change-password-page.php');
    } else if ($path === "/change-profile-picture") {
        // include 'utils/display_message.php';
        protectRoute('frontend/html/forms/change-profile-picture-page.php');
    }
    
    // HOME PAGE
    else if ($path === "/" || $path === "") {
        include_once 'frontend/html/home-page.php';
        // include 'utils/display_message.php';
        exit;
    } 

    // LIBRARY
    else if ($path === "/library") {
        // include 'utils/display_message.php';
        protectRoute('frontend/html/library/library-page.php');
    } elseif (preg_match('/\/library\/book\?id=\d+/', $path)) {
        // The URL matches the expected pattern
        // include 'utils/display_message.php';
        protectRoute("frontend/html/library/book-detail-page.php");
    } else if ($path === "/borrowed-books") {
        // include 'utils/display_message.php';
        protectRoute('frontend/html/library/borrowed-books-page.php');
    } else if ($path === "/filtered-books") {
        // include 'utils/display_message.php';
        protectRoute('frontend/html/library/filtered-books-page.php');
    } 
    // Filtering in Library
    elseif (preg_match('/\/library\/filter\?genre=\d+/', $path)) {
        // The URL matches the expected pattern
        // include 'utils/display_message.php';
        protectRoute("frontend/html/library/filtered-books-page.php");
    } elseif (preg_match('/\/library\/filter\?author=\d+/', $path)) {
        // The URL matches the expected pattern
        // include 'utils/display_message.php';
        protectRoute("frontend/html/library/filtered-books-page.php");
    } elseif (preg_match('/\/library\/filter\?genre=\d+&author=\d+$/', $path)) {
        // The URL matches the expected pattern
        // include 'utils/display_message.php';
        protectRoute("frontend/html/library/filtered-books-page.php");
    } 

    // ADMIN PAGE
    else if ($path === "/admin") {
        include_once 'admin/index.php';
        // include 'utils/display_message.php';
        exit;
    } 
    
    // PAGE NOT FOUND
    else {
        include_once 'frontend/html/page-not-found-page.php';
        exit;
    }

?>
