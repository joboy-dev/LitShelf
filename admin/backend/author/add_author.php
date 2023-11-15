<?php
    require_once '../utils/conn.php';
    require_once '../utils/upload_image.php';

    $errorMessage = null;
    $successMessage = null;

    if (isset($_POST['submit'])) {
        // Prevent JavaScript attacks through form field 
        $name = htmlspecialchars($_POST['name']);
        $authorPicture = $_FILES['picture'];

        // Upload file
        // $uploadFileResult = uploadImage($authorPicture, '../uploads/author');
        $uploadFileResult = uploadImageAdmin($authorPicture, 'author');

        // Check if author already exists in database
        $authorNameCheckQuery = "SELECT * FROM `author` WHERE `author_name`='$name'";
        $authorCheckResult = mysqli_query($conn, $authorNameCheckQuery);
    
        if ($uploadFileResult == 'too large') {
            $errorMessage = 'File too large';
        } elseif ($uploadFileResult == 'invalid') {
            $errorMessage = 'File has an invalid extension';
        } elseif ($uploadFileResult == 'no file') {

            if (mysqli_num_rows($authorCheckResult) > 0) {
                $errorMessage = 'This author ia already in the database';
            } else {
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
            }

        } else {
            if (mysqli_num_rows($authorCheckResult) > 0) {
                $errorMessage = 'This author ia already in the database';
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
        
    }

    $_SESSION['error'] = $errorMessage;
    $_SESSION['success'] = $successMessage;

?>