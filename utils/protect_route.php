<?php
    function protectRoute($route) {
        if (isset($_SESSION['user_id'])) {
            include_once $route;
            exit;
        } else {
            // Redirect to login page
            header('Location: /login');
            $_SESSION['error'] = 'You need to login first';
            exit;
        }
    }

    function protectAdminRoute($route) {
        if (isset($_SESSION['admin_id'])) {
            include_once $route;
            exit;
        } else {
            // Redirect to admin login page
            header('Location: /admin');
            $_SESSION['error'] = 'You need to login first';
            exit;
        }
    }
?>