<?php
    $successMessage = null;
    $errorMessage = null;

    if (isset($_POST["submit"])) {
        $genre = htmlspecialchars($_POST['genre']);
        $author = htmlspecialchars($_POST['author']);

        if ($genre ==='null' and $author === 'null') {
            $errorMessage = 'Please filter by either genre or author.';
        } 
        // filter by genre
        else if ($genre !== 'null'and $author === 'null') {
            header("Location: /library/filter?genre=$genre");
            $successMessage = 'Filtered books by genre';
        }

        // Filter by author
        else if ($genre === 'null'and $author !== 'null') {
            header("Location: /library/filter?author=$author");
            $successMessage = 'Filtered books by author';
        }

        // Filter by both genre and author
        else {
            header("Location: /library/filter?genre=$genre&author=$author");
            $successMessage = 'Filtered books by genre and author';
        }

    }

    $_SESSION['error'] = $errorMessage;
    $_SESSION['success'] = $successMessage;
?>