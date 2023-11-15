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
    } 
    
    // USERS
    elseif ($path === '/admin/users') {
        protectAdminRoute('frontend/html/user/add-user-form.php');
        exit;
    } elseif (preg_match('/\/admin\/users\/edit\?id=\d+/', $path)) {
        // The URL matches the expected pattern
        protectAdminRoute("frontend/html/user/edit-user-form.php");
        exit;
    } elseif (preg_match('/\/admin\/users\/delete\?id=\d+/', $path)) {
        // The URL matches the expected pattern
        protectAdminRoute("frontend/html/user/delete-user-form.php");
        exit;
    } 
    
    // AUTHORS
    elseif ($path === '/admin/authors') {
        protectAdminRoute('frontend/html/author/add-author-form.php');
        exit;
    } elseif (preg_match('/\/admin\/authors\/edit\?id=\d+/', $path)) {
        // The URL matches the expected pattern
        protectAdminRoute("frontend/html/author/edit-author-form.php");
        exit;
    } elseif (preg_match('/\/admin\/authors\/delete\?id=\d+/', $path)) {
        // The URL matches the expected pattern
        protectAdminRoute("frontend/html/author/delete-author-form.php");
        exit;
    } 
    
    // BOOKS
    elseif ($path === '/admin/books') {
        protectAdminRoute('frontend/html/book/add-book-form.php');
        exit;
    } elseif (preg_match('/\/admin\/books\/edit\?id=\d+/', $path)) {
        // The URL matches the expected pattern
        protectAdminRoute("frontend/html/book/edit-book-form.php");
        exit;
    } elseif (preg_match('/\/admin\/books\/delete\?id=\d+/', $path)) {
        // The URL matches the expected pattern
        protectAdminRoute("frontend/html/book/delete-book-form.php");
        exit;
    } 
    
    // GENRES
    elseif ($path === '/admin/genres') {
        protectAdminRoute('frontend/html/genre/add-genre-form.php');
        exit;
    } elseif (preg_match('/\/admin\/genres\/edit\?id=\d+/', $path)) {
        // The URL matches the expected pattern
        protectAdminRoute("frontend/html/genre/edit-genre-form.php");
        exit;
    } elseif (preg_match('/\/admin\/genres\/delete\?id=\d+/', $path)) {
        // The URL matches the expected pattern
        protectAdminRoute("frontend/html/genre/delete-genre-form.php");
        exit;
    } elseif ($path === '/admin/borrowed') {
        protectAdminRoute('frontend/html/borrowed/borrowed-page.php');
        exit;
    } elseif ($path === '/admin/logout') {
        protectAdminRoute('backend/logout.php');
        exit;
    } else {
        echo "<h1>Page not Found</h1>";
        exit;
    }
?>
