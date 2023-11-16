<?php
    function getAllFromSearch($tableName, $columnName, $value) {
        require '../utils/conn.php';
    
        $data = "SELECT * FROM `$tableName` WHERE `$columnName`='$value'";
        $rows = mysqli_query($conn, $data);

        return $rows;
    }
    
?>