<?php
    $errorMessage = null;
    $successMessage = null;

    if (isset($_POST["submit"])) {
        require_once '../utils/conn.php';

        // Get id of selected user from url
        $id = $_GET['id'];
        $name = htmlspecialchars($_POST['name']);

        // Check if genre name exists
        $checkGenreNameQuery = "SELECT * FROM `genre` WHERE `genre_name`='$name' AND `id`!='$id'";
        $result = mysqli_query($conn, $checkGenreNameQuery);

        if (mysqli_num_rows($result) > 0) {
            $errorMessage = 'This genre already exists';
        } else {
            // Update genre
            $editGenreQuery = "UPDATE `genre` SET `genre_name`='$name' WHERE `id`='$id'";
    
            if (mysqli_query($conn, $editGenreQuery)) {
                // Redirect to desired page
                header("Location: /admin/genres");
                $successMessage = 'Genre updated successfully';
                exit;
            } else {
                $errorMessage = 'An error occured while trying to save changes.';
            }
        }
    }

    $_SESSION['error'] = $errorMessage;
    $_SESSION['success'] = $successMessage;

?>