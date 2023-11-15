<?php 
    function getBorrowedBooksHistory() {
        require 'utils/conn.php';
        $userId = $_SESSION['user_id'];

        $checkQuery = "SELECT * FROM `borrow` WHERE `approved`=1 AND `user_id`='$userId' ORDER BY `borrow_date` DESC";
        $result = mysqli_query($conn, $checkQuery);

        return $result;
    }  

    function getBorrowedBooks() {
        require 'utils/conn.php';
        $userId = $_SESSION['user_id'];

        $checkQuery = "SELECT * FROM `borrow` WHERE `approved`=1 AND `returned`=0 AND `user_id`='$userId' ORDER BY `borrow_date` DESC";
        $result = mysqli_query($conn, $checkQuery);

        return $result;
    }  
?>