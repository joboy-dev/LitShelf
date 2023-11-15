<?php
    $errorMessage = null;
    $successMessage = null;

    if (isset($_POST["submit"])) {
        require '../utils/conn.php';
        require '../utils/upload_image.php';

        // Get id of selected user from url
        $id = $_GET['id'];
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
                // Update book wwithout cover picture to the database
                $editBookQuery = "UPDATE `book` SET `book_name`='$name', `description`='$description', `quantity_available`='$quantity', `author_id`='$author', `genre_id`='$genre' WHERE `id`='$id'";
                
                if (mysqli_query($conn, $editBookQuery)) {
                    header('Location: /admin/books');
                    $successMessage = 'New book added';
                    exit();
                } else {
                    $errorMessage = 'An error occured while adding book';
                }
            } else {
                // Upload file path into database and update book details
                $editBookQuery = "UPDATE `book` SET `book_name`='$name', `description`='$description', `coverPicture`='$uploadFileResult', `quantity_available`='$quantity', `author_id`='$author', `genre_id`='$genre' WHERE `id`='$id'";

                if (mysqli_query($conn, $editBookQuery)) {
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