<?php
    // // Unset all session variables
    // session_unset();

    // // Destroy the session
    // session_destroy();

    // unset all admin session variables
    unset($_SESSION["user_id"]);
    unset($_SESSION["email"]);
    unset($_SESSION["name"]);

    // Redirect the user to the login page or any other desired page
    header('Location: /login');
    $_SESSION['success'] = 'Logout successful';
    exit;
?>
