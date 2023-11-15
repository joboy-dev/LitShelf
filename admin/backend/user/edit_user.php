<?php
    $errorMessage = null;
    $successMessage = null;

    if (isset($_POST["submit"])) {
        require_once '../utils/conn.php';
        require_once '../utils/upload_image.php';

        $id = $_GET['id'];
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $profilePicture =$_FILES['picture'];

        // Check if email already exists for another user.
        // So if the user chooses to change only their name and leave the email as is, there will be no issue.
        $checkEmailQuery = "SELECT * FROM `user` WHERE `email` = '$email' AND `id` != '$id'";
        $result = mysqli_query($conn, $checkEmailQuery);

        if (mysqli_num_rows($result) > 0) {
            $errorMessage = "This email is already in use.";
        } else {
            // Upload file
            // $uploadFileResult = uploadImage($profilePicture, '../uploads/user');
            // $uploadFileResult = uploadImage($profilePicture, 'user');
            
            $updateProfileQuery = "UPDATE `user` SET `name`='$name', `email`='$email' WHERE `id`='$id'";
            // Run query
            if (mysqli_query($conn, $updateProfileQuery)) {
                // Redirect to desired page
                header("Location: /admin/users");
                $successMessage = 'User data updated successfully';
                exit;
            } else {
                $errorMessage = 'An error occured while trying to save changes.';
            }
            
                // if ($uploadFileResult == 'too large') {
            //     $errorMessage = 'File too large';
            // } elseif ($uploadFileResult == 'invalid') {
            //     $errorMessage = 'File has an invalid extension';
            // } elseif ($uploadFileResult == 'no file') {                 
                
            //     } else {
            //         $updateProfileQuery = "UPDATE `user` SET `name`='$name', `email`='$email', `profile_picture`='$uploadFileResult' WHERE `id`='$id'";
                    
            //         // Upload file path into database
            //         if (mysqli_query($conn, $updateProfileQuery)) {
            //             // Redirect to desired page
            //             header("Location: /admin/users");
            //             $successMessage = 'User data updated successfully';
            //             exit;
            //         } else {
            //             $errorMessage = 'An error occured while trying to save changes.';
            //         }
            //     }
        }

    }

    $_SESSION['error'] = $errorMessage;
    $_SESSION['success'] = $successMessage;

?>