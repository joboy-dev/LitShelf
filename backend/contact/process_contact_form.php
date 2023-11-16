<?php
    require 'utils/conn.php';

    $errorMessage = null;
    $successMessage = null;

    if (isset($_POST['submit'])) {
        // Prevent JavaScript attacks through form field 
        $name = htmlspecialchars($_POST['name']); 
        $email = htmlspecialchars($_POST['email']); 
        $message = htmlspecialchars($_POST['message']); 

        // Store data in database
        $addContactQuery = "INSERT into `contact` (`name`, `email`, `message`) VALUES ('$name', '$email', '$message')";
        if (mysqli_query($conn, $addContactQuery)) {
            $successMessage = 'Message sent successfully';
            header('Location: /');
        } else {
            $errorMessage = 'An error occured while sending message';
        }
    }
    
    $_SESSION['success'] = $successMessage;
    $_SESSION['error'] = $errorMessage;

?>