<!-- HEADER -->
<?php
    require 'backend/generic/get_single_from_table.php'; 
    // require 'backend/generic/get_all_from_table.php'; 
    
    $books = getAllFromTable('book');
    $pageTitle = 'Books';
    ob_start();
?>

<!-- Styles -->
<link rel="stylesheet" href="/admin/frontend/styles/admin-style.css">
<link rel="stylesheet" href="/admin/frontend/styles/forms.css">

<?php
    $styles = ob_get_clean();
    ?>

<!-- ---------------------------------------------------------------------------------------------------- -->
<!-- ---------------------------------------------------------------------------------------------------- -->

<!-- CONTENT -->
<?php
    ob_start();
?>

<!-- Main Content -->
<section id="admin">
    <!-- Display messages -->
    <?php
        include '../utils/display_message.php';
        displayMessage();
    ?>

    <!-- Check for books in the database -->
    <div class="list-container">
        <h1>Books</h1>
        <?php if ($books->num_rows > 0): ?>
            <!-- Loop through the list of books -->
            <?php foreach ($books as $book): ?>
                <!-- Get details for each genre and author based on their id -->
                <?php
                    $genre = getSingleFromTable('genre', $book['genre_id']);
                    $author = getSingleFromTable('author', $book['author_id']);
                ?>

                <div class="list">
                    <div class="actions">
                        <a href="/admin/books/edit?id=<?php echo $book['id']; ?>">📝 Edit</a>
                        <a href="/admin/books/delete?id=<?php echo $book['id']; ?>">❌ Delete</a>
                    </div>

                    <p><b>Book id: </b><?php echo $book['id']?></p>
                    <p><b>Name: </b><?php echo $book['book_name']?></p>
                    <p><b>Description: </b><?php echo $book['description']?></p>
                    <p><b>Quantity Available: </b><?php echo $book['quantity_available']?></p>
                    <p>
                        <b>Genre: </b>id-<?php echo $book['genre_id']?>
                        - <?php echo $genre['genre_name']?>
                    </p>
                    <p>
                        <b>Author: </b>id-<?php echo $book['author_id']?>
                        - <?php echo $author['author_name']?>
                    </p>

                    <div class="picture-container">
                        <p><b>Cover Picture: </b><a href="<?php echo $book['cover_picture']?>"><?php echo $book['cover_picture']?></a></p>
                        <img src="<?php echo $book['cover_picture']?>" alt="pic">
                    </div>
                </div> 
            <?php endforeach?>
        <?php else: ?>
            <p class="no-rows">No books in database</p>
        <?php endif?>
    </div>

    <?php 
       echo $form;
    ?>

</section>

<?php
    $content = ob_get_clean();
    include 'base.php';
?>