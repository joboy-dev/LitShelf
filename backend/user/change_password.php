<?php
    include 'utils/password_check.php';

    $errorMessage = null;
    $successMessage= null;

    if (isset($_POST["submit"])) {
        require 'utils/conn.php';

        $id = $_SESSION['user_id'];
        $email = htmlspecialchars($_POST["email"]);
        $oldPassword = htmlspecialchars($_POST["old-password"]);
        $newPassword = htmlspecialchars($_POST["new-password"]);
        $confirmPassword = htmlspecialchars($_POST["confirm-password"]);

        // Reauthenticate the user
        $checkEmailQuery = "SELECT * FROM `user` WHERE `email`='$email'";
        $result = mysqli_query($conn, $checkEmailQuery);

        if (mysqli_num_rows($result) == 0) {
            $errorMessage = "This user does not exist";
        } else {
            // Get user details
            $user = mysqli_fetch_assoc($result);

            // Check old password
            if (password_verify($oldPassword, $user["password"])) {
                // Check new password match
                if ($newPassword === $confirmPassword) {
                    // Check if password is valid
                    if (!passwordValid($newPassword) or !passwordValid($confirmPassword)) {
                        $errorMessage = "Your new password is not valid";
                    } else {
                        // Save password hash in database
                        $passwordHash = password_hash($newPassword, PASSWORD_BCRYPT);
                        $changePasswordQuery = "UPDATE `user` SET `password`='$passwordHash' WHERE `id`='$id'";

                        if (mysqli_query($conn, $changePasswordQuery)) {
                            $successMessage = 'Password updated successfully';
                            header("Location: /profile");
                        } else {
                            $errorMessage = "An error occured while trying to save your new password. Please try again";
                        }
                    }
                } else {
                    $errorMessage = "Your new passwords no not match";
                }
            } else {
                $errorMessage = "Old password is incorrect. Try again";
            }
        }
    }

    $_SESSION['error'] = $errorMessage;
    $_SESSION['success'] = $successMessage;
?>