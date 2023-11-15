<?php
    require '../utils/conn.php';

    $errorMessage = null;
    $successMessage = null;

    if (isset($_POST['submit'])) {
        // Prevent JavaScript attacks through form field 
        $name = htmlspecialchars($_POST['name']);

        // Check if genre name exists
        $checkGenreNameQuery = "SELECT * FROM `genre` WHERE `genre_name`='$name'";
        $result = mysqli_query($conn, $checkGenreNameQuery);

        if (mysqli_num_rows($result) > 0) {
            $errorMessage = 'This genre already exists';
        } else {
            // Add genre to database
            $addGenreQuery = "INSERT into `genre` (`genre_name`) VALUES ('$name')";
            
            if (mysqli_query($conn, $addGenreQuery)) {
                header('Location: /admin/genres');
                $successMessage = 'New genre added';
                exit();
            } else {
                $errorMessage = 'An error occured while adding genre';
            }
        }
    }

    $_SESSION['error'] = $errorMessage;
    $_SESSION['success'] = $successMessage;

?>