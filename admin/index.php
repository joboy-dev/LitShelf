<?php
    include '../utils/protect_route.php';

    session_start();

    // Determine which page to load based on the URL
    $path = $_SERVER['REQUEST_URI'];

    // include '../utils/display_message.php';
    // displayMessage();

    if ($path === '/admin') {
        include 'frontend/html/login-form.php';
        exit;
    } elseif ($path === '/admin/users') {
        protectAdminRoute('frontend/html/users-page.php');
        exit;
    } elseif ($path === '/admin/authors') {
        protectAdminRoute('frontend/html/authors-page.php');
        exit;
    } elseif ($path === '/admin/books') {
        protectAdminRoute('frontend/html/books-page.php');
        exit;
    } elseif ($path === '/admin/borrowed') {
        protectAdminRoute('frontend/html/borrowed-page.php');
        exit;
    } elseif ($path === '/admin/logout') {
        protectAdminRoute('backend/logout.php');
        exit;
    } else {
        echo "<h1>Page not Found</h1>";
        exit;
    }
?>
