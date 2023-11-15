<?php
    function getSingleFromTable($tableName, int $id) {
        require 'utils/conn.php';

        $query = "SELECT * FROM `$tableName` WHERE `id`=$id";
        $result = mysqli_query($conn, $query);

        $row = mysqli_fetch_assoc($result);

        return $row;
    }
    
?>