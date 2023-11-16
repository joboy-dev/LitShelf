<?php
    $successMessage = null;
    $errorMessage = null;

    if (isset($_POST["submit"])) {
        require_once 'utils/conn.php';

        $userId = $_SESSION['user_id'];
        $bookId = $_GET['id'];

        // Check if requested book has been borrowed by the user and not returned
        $checkQuery = "SELECT * FROM `borrow` WHERE `user_id`='$userId' AND `book_id`='$bookId' AND `returned`=0";
        $result = mysqli_query($conn, $checkQuery);

        if (mysqli_num_rows($result) > 0) {
            header("Location: /library/book?id=$bookId");
            $errorMessage = "This book has already been requested for or borrowed by you and has not been returned.";
        } else {
            // Store request data in database
            $makeRequestQuery = "INSERT INTO `borrow` (`user_id`, `book_id`) VALUES ('$userId', '$bookId')";
    
            if (mysqli_query($conn, $makeRequestQuery)) {
                // header("Location: /library/book?id=$bookId");
                $successMessage = 'Borrow request sent.';
            } else {
                $errorMessage = 'There was an issue while trying to send request. Please try again.';
            }
        }
    }

    $_SESSION['error'] = $errorMessage;
    $_SESSION['success'] = $successMessage;
?>