<?php 
    $errorMessage = null;
    $successMessage = null;

    if (isset($_POST['submit'])) {
        require 'utils/conn.php';

        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        $loginQuery = "SELECT * FROM `user` WHERE `email`='$email'";
        $result = mysqli_query($conn, $loginQuery);

        if (mysqli_num_rows($result) > 0) {
            // Get the user details
            $user = mysqli_fetch_assoc($result);
            
            // Verify password
            if (password_verify($password, $user["password"])) {
                // Store all logged in user data in the SESSION.
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['name'] = $user['name'];
                $_SESSION['profile_picture'] = $user['profile_picture'];
                
                // Redirect to home page
                header('Location: /');

                $successMessage = "Welcome" . $_SESSION['email'];
                // exit;
            } else {
                $errorMessage = 'Password is incorrect. Try again.';
            }
        } else {
            $errorMessage = 'This user does not exist.  Please check your email';
        }
    }

    $_SESSION['error'] = $errorMessage;
    $_SESSION['success'] = $successMessage;
?>