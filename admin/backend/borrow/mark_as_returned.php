<?php
    $successMessage = null;
    $errorMessage = null;

    require_once 'backend/generic/get_single_from_table.php';
    $borrowId = $_GET['id'];
    $bookId = $_GET['book_id'];

    // Get book to be borrowed by id
    $book = getSingleFromTable('book', $bookId);
    $borrowRequest = getSingleFromTable('borrow', $borrowId);

    if (isset($_POST["submit"])) {
        require '../utils/conn.php';

        if (!$book and !$borrowRequest) {
            $errorMessage = "Request is invalid";
        } else {           
            // Approve the request
            $markAsReturned = "UPDATE `borrow` SET `returned`=1 WHERE `id`='$borrowId'";
    
            if (mysqli_query($conn, $markAsReturned)) {
                // Update quantity of available books in database
                $updatedQuantity = $book['quantity_available'] + 1;
                
                $updateBookQuantityQuery = "UPDATE `book` SET `quantity_available`='$updatedQuantity' WHERE `id`='$bookId'";
                
                if (mysqli_query($conn, $updateBookQuantityQuery)) {
                    $successMessage = 'Book marked as returned.';
                    header('Location: /admin/borrowed-books');
                    // exit;
                } else {
                    $errorMessage = 'There was an issue while trying to update book quantity. Please try again.';
                }
            } else {
                $errorMessage = 'There was an issue while trying to approve return. Please try again.';
                // exit;
            }
            
        }
    }

    $_SESSION['error'] = $errorMessage;
    $_SESSION['success'] = $successMessage;
?>