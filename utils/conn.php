<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "litshelfdb";

    // Create connection
    $conn = new mysqli($host, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>


