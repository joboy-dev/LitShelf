<?php
    $errorMessage = null;
    $successMessage = null;

    if (isset($_POST["submit"])) {
        require '../utils/conn.php';
        require '../utils/upload_image.php';

        // Get id of selected user from url
        $id = $_GET['id'];
        $name = htmlspecialchars($_POST['name']);
        $authorPicture =$_FILES['picture'];
        
        // Upload file
        // $uploadFileResult = uploadImage($authorPicture, '../uploads/author');
        $uploadFileResult = uploadImageAdmin($authorPicture, 'author');
        
        if ($uploadFileResult == 'too large') {
            $errorMessage = 'File too large';
        } elseif ($uploadFileResult == 'invalid') {
            $errorMessage = 'File has an invalid extension';
        } elseif ($uploadFileResult == 'no file') {
            // Update author
            $editAuthorQuery = "UPDATE `author` SET `author_name`='$name' WHERE `id`='$id'";

            // Run query
            if (mysqli_query($conn, $editAuthorQuery)) {
                header('Location: /admin/authors');
                $successMessage = 'Author updated';
                exit();
            } else {
                $errorMessage = 'An error occured while updating author';
            }
        } else {
             // Update author
             $editAuthorQuery = "UPDATE `author` SET `author_name`='$name', `author_picture`='$uploadFileResult' WHERE `id`='$id'";
            // Run query
            if (mysqli_query($conn, $editAuthorQuery)) {
                header('Location: /admin/authors');
                $successMessage = 'Author updated';
                exit();
            } else {
                $errorMessage = 'An error occured while updating author';
            }
        }
    }

    $_SESSION['error'] = $errorMessage;
    $_SESSION['success'] = $successMessage;

?>