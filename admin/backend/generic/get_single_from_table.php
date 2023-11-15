<?php
    require '../utils/conn.php';

    function getSingleFromTable($tableName, int $id) {
        require '../utils/conn.php';

        $data = "SELECT * FROM `$tableName` WHERE `id`=$id";
        $result = mysqli_query($conn, $data);

        $row = mysqli_fetch_assoc($result);

        return $row;
    }
    
?>