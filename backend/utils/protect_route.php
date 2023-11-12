<?php
    function protextRoute($routename) {
        if (isset($_SESSION['user_id'])) {
            include $routename;
            exit;
        } else {
            // Redirect to login page
            header('Location: /login');
            $_SESSION['error'] = 'You need to login first';
            exit;
        }
    }
?>