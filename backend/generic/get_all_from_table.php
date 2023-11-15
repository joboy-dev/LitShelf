<?php
    function getAllFromTable($tableName) {
        require 'utils/conn.php';
    
        $query = "SELECT * FROM `$tableName`";
        $rows = mysqli_query($conn, $query);

        return $rows;
    }
    
?>