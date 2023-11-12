<?php
    $errorMessage = null;
    $successMessage = null;

    if (isset($_POST["submit"])) {
        require 'utils/conn.php';

        $id = $_SESSION['user_id'];
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);

        // Check if email already exists
        $checkEmailQuery = "SELECT * FROM `user` WHERE `email` = '$email'";
        $result = mysqli_query($conn, $checkEmailQuery);

        if (mysqli_num_rows($result) > 0) {
            $errorMessage = "This email is already in use. Pick another email.";
        } else {
            // Update user profile
            $updateProfileQuery = "UPDATE `user` SET `name`='$name', `email`='$email' WHERE `id`='$id'";
    
            if (mysqli_query($conn, $updateProfileQuery)) {
                // Update session variables
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;

                // Redirect to desired page
                header("Location: /profile");
                $successMessage = 'Profile updated successfully';
                exit;
            } else {
                $errorMessage = 'An error occured while trying to save changes.';
            }
        }

    }

    $_SESSION['error'] = $errorMessage;
    $_SESSION['success'] = $successMessage;

?>