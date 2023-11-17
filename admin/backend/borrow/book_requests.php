<?php
    function getUnapprovedRequests() {
        require '../utils/conn.php';

        $checkQuery = "SELECT * FROM `borrow` WHERE `approved`=0 ORDER BY `borrow_date` ASC";
        $result = mysqli_query($conn, $checkQuery);

        return $result;
    }  
    
    function getUnreturnedBooks() {
        require '../utils/conn.php';

        $checkQuery = "SELECT * FROM `borrow` WHERE `approved`=1 AND `returned`=0 ORDER BY `borrow_date` DESC";
        $result = mysqli_query($conn, $checkQuery);

        return $result;
    } 
     
    function getApprovedRequestsHistory() {
        require '../utils/conn.php';

        $checkQuery = "SELECT * FROM `borrow` WHERE `approved`=1 ORDER BY `borrow_date` DESC";
        $result = mysqli_query($conn, $checkQuery);

        return $result;
    }  

?>