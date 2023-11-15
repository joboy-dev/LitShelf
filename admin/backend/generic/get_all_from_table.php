<?php
    function getAllFromTable($tableName) {
        require '../utils/conn.php';
    
        $data = "SELECT * FROM `$tableName`";
        $rows = mysqli_query($conn, $data);

        return $rows;
    }
    
?>