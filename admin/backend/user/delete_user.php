<?php
    require_once '../utils/conn.php';

    $errorMessage = null;
    $successMessage = null;

    
    if (isset($_POST['submit'])) {
        // Get id from url
        $id = $_GET['id'];
        
        // Delete User
        $deleteUserQuery = "DELETE FROM `user` WHERE `id` = '$id'";

        if (mysqli_query($conn, $deleteUserQuery)) {
            $_SESSION['success'] = 'User Deleted';
            header('Location: /admin/users');
        } else {
            $errorMessage = 'An error occured while deleting user';
        }
    }
        

    $_SESSION['error'] = $errorMessage;
    $_SESSION['success'] = $successMessage;

?>