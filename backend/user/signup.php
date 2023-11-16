<?php
    require 'utils/conn.php';
    include 'utils/password_check.php';

    $errorMessage = null;
    $successMessage = null;

    if (isset($_POST['submit'])) {
        // Prevent JavaScript attacks through form field 
        $name = htmlspecialchars($_POST['name']); 
        $email = htmlspecialchars($_POST['email']); 
        $password = htmlspecialchars($_POST['password']); 
        $confirmPassword = htmlspecialchars($_POST['confirm-password']); 

        // Check if passwords match
        if ($password !== $confirmPassword) {
            $errorMessage = 'Your passwords do not match';
        } else {            
            // Check if password has meets required specifications
            if (!passwordValid($password) or !passwordValid($confirmPassword)) {
                $errorMessage = 'Your password is not valid.';
            } else {
                // Check if email already exists
                $checkEmailQuery = "SELECT * FROM `user` WHERE `email` = '$email'";
                $result = mysqli_query($conn, $checkEmailQuery);

                if (mysqli_num_rows($result) > 0) {
                    // Email already exists
                    $errorMessage = 'Email address is already in use. Please choose another email.';
                } else {
                    // Hash Password
                    $passwordHash = password_hash($password, PASSWORD_BCRYPT);
    
                    // Store data in database
                    $signUpQuery = "INSERT into `user` (`name`, `email`, `password`) VALUES ('$name', '$email', '$passwordHash')";
                    if (mysqli_query($conn, $signUpQuery)) {
                        // header('Location: /login');
                        $successMessage = 'Account created successfully. You can now login.';
                    } else {
                        $errorMessage = 'An error occured while creating your account';
                    }
                }
            }
        }
    }

    $_SESSION['error'] = $errorMessage;
    $_SESSION['success'] = $successMessage;

?>