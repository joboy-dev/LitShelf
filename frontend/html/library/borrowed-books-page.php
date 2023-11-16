
<!-- HEADER -->
<?php
    require_once 'backend/library/get_borrowed_books.php';
    require_once 'backend/generic/get_single_from_table.php';

    $borrows = getBorrowedBooks();

    $pageTitle = 'Borrowed Books';
    ob_start();
?>

<!-- Styles -->
<link rel="stylesheet" href="/frontend/styles/library.css">
<link rel="stylesheet" href="/frontend/styles/forms.css">

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
<section id="library">
    <!-- Display messages -->
    <?php
        // include 'utils/display_message.php';
        // displayMessage();
    ?>
    
    <div class="breadcrumb">
        <h1>Borrowed Books</h1>
        <p>These are the books you have borrowed and wish to read.</p>
    </div>

    <div class="library-content">
        <div class="all-books">
            <?php if($borrows-> num_rows > 0): ?>
                <?php foreach($borrows as $borrow): ?>
                    <!-- Get details for each genre and author based on their id -->
                    <?php
                        $book = getSingleFromTable('book', $borrow['book_id']);
                        $bookAuthor = getSingleFromTable('author', $book['author_id']);
                    ?>

                    <div class="book">
                        <div class="picture">
                            <img src="<?php echo $book['cover_picture'] ?>" alt="book pic">
                        </div>

                        <div class="details">
                            <p href="/library/book?id=<?php echo $book['id']; ?>" class="book-title"><?php echo $book['book_name']?></p>
                            
                            <p>
                                <b>Description</b>
                                <?php echo strlen($book['description']) > 80 ? substr($book['description'], 0, 80).'...' : $book['description']; ?>
                            </p>

                            <p>
                                <b>Written by</b>
                                <?php echo $bookAuthor['author_name']?>
                            </p>
                        </div>
                    </div>
                <?php endforeach ?>
            <?php else: ?>
                <p class="no-content">No books have been borrowed.</p>
            <?php endif ?>
        </div>

    </div>
</section>

<?php
    $content = ob_get_clean();
    include 'base.php';
?>