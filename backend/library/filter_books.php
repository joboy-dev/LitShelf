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
            $_SESSION['success'] = 'Filtered books by genre';
            header("Location: /library/filter?genre=$genre");
        }

        // Filter by author
        else if ($genre === 'null'and $author !== 'null') {
            $_SESSION['success'] = 'Filtered books by author';
            header("Location: /library/filter?author=$author");
        }

        // Filter by both genre and author
        else {
            $_SESSION['success'] = 'Filtered books by genre and author';
            header("Location: /library/filter?genre=$genre&author=$author");
        }

    }

    $_SESSION['error'] = $errorMessage;
    // $_SESSION['success'] = $successMessage;
?>