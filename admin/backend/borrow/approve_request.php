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
            // echo $errorMessage;
            // exit;
        } else {
            // Check if number of books available in database is equal to 0
            if ($book['quantity_available'] == 0) {
                $errorMessage = 'There are no more copies of this book available';
            } else {
                // Approve the request
                $approveRequestQuery = "UPDATE `borrow` SET `approved`=1 WHERE `id`='$borrowId'";
        
                if (mysqli_query($conn, $approveRequestQuery)) {
                    // Update quantity of available books in database
                    // $book = mysqli_fetch_assoc($bookResult);
                    $updatedQuantity = $book['quantity_available'] - 1;
                    
                    $updateBookQuantityQuery = "UPDATE `book` SET `quantity_available`='$updatedQuantity' WHERE `id`='$bookId'";
                    
                    if (mysqli_query($conn, $updateBookQuantityQuery)) {
                        $successMessage = 'Book request approved.';
                        header('Location: /admin/book-requests');
                        // exit;
                    } else {
                        $errorMessage = 'There was an issue while trying to send request. Please try again.';
                    }
                } else {
                    $errorMessage = 'There was an issue while trying to approve request. Please try again.';
                    // exit;
                }
            }
        }
    }

    $_SESSION['error'] = $errorMessage;
    $_SESSION['success'] = $successMessage;
?>