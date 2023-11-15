<?php
    require '../utils/conn.php';

    $errorMessage = null;
    $successMessage = null;

    
    if (isset($_POST['submit'])) {
        // Get id from url
        $id = $_GET['id'];
        
        // Delete author
        $deleteAuthorQuery = "DELETE FROM `author` WHERE `id` = '$id'";

        if (mysqli_query($conn, $deleteAuthorQuery)) {
            $_SESSION['success'] = 'Author Deleted';
            header('Location: /admin/authors');
        } else {
            $errorMessage = 'An error occured while deleting author';
        }
    }
        

    $_SESSION['error'] = $errorMessage;
    $_SESSION['success'] = $successMessage;

?>