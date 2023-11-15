<?php
    require_once '../utils/conn.php';

    $errorMessage = null;
    $successMessage = null;

    
    if (isset($_POST['submit'])) {
        // Get id from url
        $id = $_GET['id'];
        
        // Delete genre
        $deleteGenreQuery = "DELETE FROM `genre` WHERE `id` = '$id'";

        if (mysqli_query($conn, $deleteGenreQuery)) {
            $_SESSION['success'] = 'Genre Deleted';
            header('Location: /admin/genres');
        } else {
            $errorMessage = 'An error occured while deleting genre';
        }
    }
        

    $_SESSION['error'] = $errorMessage;
    $_SESSION['success'] = $successMessage;

?>