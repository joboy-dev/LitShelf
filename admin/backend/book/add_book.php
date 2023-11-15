<?php
    require_once '../utils/conn.php';
    require_once '../utils/upload_image.php';

    $errorMessage = null;
    $successMessage = null;

    if (isset($_POST['submit'])) {
        // Prevent JavaScript attacks through form field 
        $name = htmlspecialchars($_POST['name']);
        $description = htmlspecialchars($_POST['description']);
        $author = htmlspecialchars($_POST['author']);
        $genre = htmlspecialchars($_POST['genre']);
        $quantity = htmlspecialchars($_POST['quantity']);
        $coverPicture = $_FILES['picture'];

        if ($genre==='null' or $author==='null') {
            $errorMessage = 'Check genre and author fields.';
        } else {
            // Upload file
            $uploadFileResult = uploadImageAdmin($coverPicture, 'book');
    
            if ($uploadFileResult == 'too large') {
                $errorMessage = 'File too large';
            } elseif ($uploadFileResult == 'invalid') {
                $errorMessage = 'File has an invalid extension';
            } elseif ($uploadFileResult == 'no file') {
                // Upload book wwithout cover picture to the database
                $addBookQuery = "INSERT into `book` (`book_name`, `description`, `quantity_available`, `author_id`, `genre_id`) VALUES ('$name', '$description', '$quantity', '$author', '$genre')";

                if (mysqli_query($conn, $addBookQuery)) {
                    header('Location: /admin/books');
                    $successMessage = 'New book added';
                    exit();
                } else {
                    $errorMessage = 'An error occured while adding book';
                }
            } else {
                // Upload file path into database
                $addBookQuery = "INSERT into `book` (`book_name`, `description`, `quantity_available`, `cover_picture`, `author_id`, `genre_id`) VALUES ('$name', '$description', '$quantity', '$uploadFileResult', '$author', '$genre')";
                $successMessage = 'File Uploaded';

                if (mysqli_query($conn, $addBookQuery)) {
                    header('Location: /admin/books');
                    $successMessage = 'New book added';
                    exit();
                } else {
                    $errorMessage = 'An error occured while adding book';
                }
            }
        }
        
    }

    $_SESSION['error'] = $errorMessage;
    $_SESSION['success'] = $successMessage;

?>