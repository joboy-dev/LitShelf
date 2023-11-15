
<!-- HEADER -->
<?php
    require 'backend/generic/get_single_from_table.php';

    $id = $_GET['id'];

    $book = getSingleFromTable('book', $id);
    $bookGenre = getSingleFromTable('genre', $book['genre_id']);
    $bookAuthor = getSingleFromTable('author', $book['author_id']);

    $pageTitle = 'Library';
    ob_start();
?>

<!-- Styles -->
<link rel="stylesheet" href="/frontend/styles/book-detail.css">
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
<section id="book-details">
    <!-- Display messages -->
    <?php
        include 'utils/display_message.php';
        displayMessage();
    ?>
    
    <div class="breadcrumb">
        <h1><?php echo $book['book_name']; ?></h1>
        <p>By</p>
        <p><?php echo $bookAuthor['author_name']; ?></p>
    </div>

    <div class="book-details-content">
        <div class="description">
            <h2>About the book</h2>
            <p><?php echo $book['description']; ?></p>

            <h2>Author</h2>
            <div class="author-picture">
                <img src="<?php echo $bookAuthor['author_picture'] ?>" alt="book pic">
            </div>
            <p><?php echo $bookAuthor['author_name']; ?></p><br>
        </div>

        <div class="other">
            <div class="book-picture">
                <img src="<?php echo $book['cover_picture'] ?>" alt="book pic">
            </div>

            <?php if ($book['quantity_available'] ==0): ?>
                <p>Sorry, this book is not available right now. Check back later</p>
                <br><hr><br>
            <?php else:?>
                <p style="text-align:center;"><b>Quantity Available:</b> <?php echo $book['quantity_available']; ?></p><br>
                <form action="" method="post" class="request-form">
                    <div class="submit">
                        <input type="submit" name="submit" value="Request to borrow">
                    </div>
                </form>
            <?php endif?>
        </div>
    </div>
</section

<?php
    $content = ob_get_clean();
    include 'base.php';
?>