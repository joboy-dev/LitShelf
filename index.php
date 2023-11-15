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
    } else if ($path === "/change-profile-picture") {
        protectRoute('frontend/html/forms/change-profile-picture-page.php');
    } else if ($path === "/" || $path === "") {
        include 'frontend/html/home-page.php';
        exit;
    } 

    // LIBRARY
    else if ($path === "/library") {
        protectRoute('frontend/html/library/library-page.php');
    } elseif (preg_match('/\/library\/book\?id=\d+/', $path)) {
        // The URL matches the expected pattern
        protectRoute("frontend/html/library/book-detail-page.php");
        exit;
    } else if ($path === "/borrowed-books") {
        protectRoute('frontend/html/library/borrowed-books-page.php');
    } else if ($path === "/filtered-books") {
        protectRoute('frontend/html/library/filtered-books-page.php');
    } 
    // Filtering in Library
    elseif (preg_match('/\/library\/filter\?genre=\d+/', $path)) {
        // The URL matches the expected pattern
        protectRoute("frontend/html/library/filtered-books-page.php");
        exit;
    } elseif (preg_match('/\/library\/filter\?author=\d+/', $path)) {
        // The URL matches the expected pattern
        protectRoute("frontend/html/library/filtered-books-page.php");
        exit;
    } elseif (preg_match('/\/library\/filter\?genre=\d+&author=\d+$/', $path)) {
        // The URL matches the expected pattern
        protectRoute("frontend/html/library/filtered-books-page.php");
        exit;
    } 

    // ADMIN PAGE
    else if ($path === "/admin") {
        include 'admin/index.php';
        exit;
    } 
    
    // PAGE NOT FOUND
    else {
        include 'frontend/html/page-not-found-page.php';
        exit;
    }
?>
