<?php
    function getBookFilterResults() {
        require 'utils/conn.php';

        // Get path url
        $path = $_SERVER['REQUEST_URI'];

        // Check if path matches the regular expressions to determine what to filter by
        if (preg_match('/\/library\/filter\?genre=\d+&author=\d+$/', $path)) {
            $genreId = $_GET['genre'];
            $authorId = $_GET['author'];
            $filterQuery = "SELECT * FROM `book` WHERE `genre_id`='$genreId' AND `author_id`='$authorId'";
        } elseif (preg_match('/\/library\/filter\?genre=\d+/', $path)) {
            $genreId = $_GET['genre'];
            $filterQuery = "SELECT * FROM `book` WHERE `genre_id`='$genreId'";
        } elseif (preg_match('/\/library\/filter\?author=\d+/', $path)) {
            $authorId = $_GET['author'];
            $filterQuery = "SELECT * FROM `book` WHERE `author_id`='$authorId'";
        }

        $result = mysqli_query($conn, $filterQuery);
        return $result;
    }
?>