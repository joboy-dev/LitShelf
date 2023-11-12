<?php
    // Unset all session variables
    session_unset();

    // Destroy the session
    session_destroy();

    // Redirect the user to the login page or any other desired page
    header('Location: /login');
    $_SESSION['success'] = 'Logout successful';
    exit;
?>
