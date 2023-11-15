<?php
    $successMessage = null;
    $errorMessage = null;

    if (isset($_POST["submit"])) {
        require_once 'utils/conn.php';

        $userId = $_SESSION['user_id'];
        $bookId = $_GET['id'];

        // echo $userId;
        // echo $bookId;

        // Check if requested book has been borrowed by the user and not returned
        $checkQuery = "SELECT * FROM `borrow` WHERE `user_id`='$userId' AND `book_id`='$bookId' AND `returned`=0";
        $result = mysqli_query($conn, $checkQuery);

        if (mysqli_num_rows($result) > 0) {
            $errorMessage = "This book has already been borrowed by you and has not been returned.";
        } else {
            // Store request data in database
            $makeRequestQuery = "INSERT INTO `borrow` (`user_id`, `book_id`) VALUES ('$userId', '$bookId')";
    
            if (mysqli_query($conn, $makeRequestQuery)) {
                $successMessage = 'Borrow request sent.';
                // exit;
            } else {
                $errorMessage = 'There was an issue while trying to send request. Please try again.';
                // exit;
            }
        }
    }

    $_SESSION['error'] = $errorMessage;
    $_SESSION['success'] = $successMessage;
?>