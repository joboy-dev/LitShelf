<?php
    require '../utils/conn.php';
    require '../utils/upload_image.php';

    $errorMessage = null;
    $successMessage = null;

    if (isset($_POST['submit'])) {
        // Prevent JavaScript attacks through form field 
        $name = htmlspecialchars($_POST['name']);
        $authorPicture = $_FILES['picture'];

        // Upload file
        // $uploadFileResult = uploadImage($authorPicture, '../uploads/author');
        $uploadFileResult = uploadImageAdmin($authorPicture, 'author');
    
        if ($uploadFileResult == 'too large') {
            $errorMessage = 'File too large';
        } elseif ($uploadFileResult == 'invalid') {
            $errorMessage = 'File has an invalid extension';
        } elseif ($uploadFileResult == 'no file') {
            // Upload author wwithout cover picture to the database
            $addAuthorQuery = "INSERT into `author` (`author_name`) VALUES ('$name')";

            // Run query
            if (mysqli_query($conn, $addAuthorQuery)) {
                header('Location: /admin/authors');
                $successMessage = 'New author added';
                exit();
            } else {
                $errorMessage = 'An error occured while adding author';
            }
        } else {
            // Upload file path into database
            $addAuthorQuery = "INSERT into `author` (`author_name`, `author_picture`) VALUES ('$name', '$uploadFileResult')";  

            // Run query
            if (mysqli_query($conn, $addAuthorQuery)) {
                header('Location: /admin/authors');
                $successMessage = 'New author added';
                exit();
            } else {
                $errorMessage = 'An error occured while adding author';
            }
        }
        
    }

    $_SESSION['error'] = $errorMessage;
    $_SESSION['success'] = $successMessage;

?>