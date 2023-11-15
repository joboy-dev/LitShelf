<?php
    require_once '../utils/conn.php';
    include_once '../utils/password_check.php';
    include_once '../utils/upload_image.php';

    $errorMessage = null;
    $successMessage = null;

    if (isset($_POST['submit'])) {
        // Prevent JavaScript attacks through form field 
        $name = htmlspecialchars($_POST['name']); 
        $email = htmlspecialchars($_POST['email']); 
        $password = htmlspecialchars($_POST['password']);
        $confirmPassword = htmlspecialchars($_POST['confirm-password']);
        // $profilePicture = $_FILES['picture'];

        // Check if passwords match
        if ($password !== $confirmPassword) {
            $errorMessage = 'Passwords do not match';
        } else {            
            // Check if password has meets required specifications
            if (!passwordValid($password) or !passwordValid($confirmPassword)) {
                $errorMessage = 'Password is not valid.';
            } else {
                // Check if email already exists
                $checkEmailQuery = "SELECT * FROM `user` WHERE `email` = '$email'";
                $result = mysqli_query($conn, $checkEmailQuery);

                if (mysqli_num_rows($result) > 0) {
                    // Email already exists
                    $errorMessage = 'Email address is already in use.';
                } else {
                    // Hash Password
                    $passwordHash = password_hash($password, PASSWORD_BCRYPT);
                    

                    // Upload author wwithout cover picture to the database
                    $addUserQuery = "INSERT into `user` (`name`, `email`, `password`) VALUES ('$name', '$email', '$passwordHash')";
                    
                    // Run query
                    if (mysqli_query($conn, $addUserQuery)) {
                        header('Location: /admin/users');
                        $successMessage = 'New user added';
                        exit();
                    } else {
                        $errorMessage = 'An error occured while adding user';
                    }
                    
                    // Upload file
                    // $uploadFileResult = uploadImage($profilePicture, '../uploads/user');
                    
                    // if ($uploadFileResult == 'too large') {
                    //     $errorMessage = 'File too large';
                    // } elseif ($uploadFileResult == 'invalid') {
                    //     $errorMessage = 'File has an invalid extension';
                    // } elseif ($uploadFileResult == 'no file') {
                    // } else {
                    //     // Upload file path into database
                    //     $addUserQuery = "INSERT into `user` (`name`, `email`, `password`, `profile_picture`) VALUES ('$name', '$email', '$passwordHash', '$uploadFileResult')";  

                    //     // Run query
                    //     if (mysqli_query($conn, $addUserQuery)) {
                    //         header('Location: /admin/users');
                    //         $successMessage = 'New user added';
                    //         exit();
                    //     } else {
                    //         $errorMessage = 'An error occured while adding user';
                    //     }
                    // }
                }
            }
        }
    }

    $_SESSION['error'] = $errorMessage;
    $_SESSION['success'] = $successMessage;

?>