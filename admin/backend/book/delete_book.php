<?php
    require_once '../utils/conn.php';

    $errorMessage = null;
    $successMessage = null;

    
    if (isset($_POST['submit'])) {
        // Get id from url
        $id = $_GET['id'];
        
        // Delete book
        $deleteBookQuery = "DELETE FROM `book` WHERE `id` = '$id'";

        if (mysqli_query($conn, $deleteBookQuery)) {
            $_SESSION['success'] = 'Book Deleted';
            header('Location: /admin/books');
        } else {
            $errorMessage = 'An error occured while deleting book';
        }
    }
        

    $_SESSION['error'] = $errorMessage;
    $_SESSION['success'] = $successMessage;

?>