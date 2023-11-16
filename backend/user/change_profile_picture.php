<?php
    require 'utils/conn.php';
    include 'utils/password_check.php';
    include 'utils/upload_image.php';

    $errorMessage = null;
    $successMessage = null;

    if (isset($_POST['submit'])) {
        $id = $_SESSION['user_id'];
        $profilePicture = $_FILES['picture'];

        // Upload file
        $uploadFileResult = uploadImage($profilePicture, 'user');
        
        if ($uploadFileResult == 'too large') {
            $errorMessage = 'File too large';
        } elseif ($uploadFileResult == 'invalid') {
            $errorMessage = 'File has an invalid extension';
        } elseif ($uploadFileResult == 'no file') {
            $errorMessage = 'Please select a file';
        } else {
            // Upload file path into database
            $updatePictureQuery = "UPDATE `user` SET `profile_picture`='$uploadFileResult' WHERE `id`='$id'";  

            // Run query
            if (mysqli_query($conn, $updatePictureQuery)) {
                // Update session variable
                $_SESSION['profile_picture'] = $uploadFileResult;

                header('Location: /profile');
                $successMessage = 'Profile picture updated';
            } else {
                $errorMessage = 'An error occured while updating profile picture';
            }
        }
    }

    $_SESSION['error'] = $errorMessage;
    $_SESSION['success'] = $successMessage;

?>