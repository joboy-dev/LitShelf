<?php 
    // session_start();
    $errorMessage = null;
    $successMessage = null;

    if (isset($_POST['submit'])) {
        require '../utils/conn.php';

        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        $loginQuery = "SELECT * FROM `admin` WHERE `email`='$email'";
        $result = mysqli_query($conn, $loginQuery);

        if (mysqli_num_rows($result) > 0) {
            // Get the user details
            $admin = mysqli_fetch_assoc($result);
            
            // Verify password
            if ($password === $admin["password"]) {
                // Store all logged in admin data in the SESSION.
                $_SESSION['admin_id'] = $admin['id'];
                $_SESSION['admin_email'] = $admin['email'];

                $successMessage = "Welcome admin.";

                // Redirect to users page
                header('Location: /admin/users');
                exit;
            } else {
                $errorMessage = 'Password is incorrect. Try again.';
            }
        } else {
            $errorMessage = 'This is not an admin account. Please check your email.';
        }
    }

    $_SESSION['error'] = $errorMessage;
    $_SESSION['success'] = $successMessage;
?>