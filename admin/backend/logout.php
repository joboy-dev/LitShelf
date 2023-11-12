<?php
    // unset all admin session variables
    unset($_SESSION["admin_id"]);
    unset($_SESSION["admin_email"]);

    // Redirect the user to the login page or any other desired page
    header('Location: /admin');
    $_SESSION['success'] = 'Logout successful';
    exit;
?>
