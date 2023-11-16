
<!-- HEADER -->
<?php
    require_once 'backend/generic/get_all_from_table.php';
    require_once 'backend/generic/get_single_from_table.php';
    require_once 'backend/library/get_book_filter_results.php';

    $pageTitle = 'Library';
    ob_start();

    $books = getBookFilterResults();

?>

<!-- Styles -->
<link rel="stylesheet" href="/frontend/styles/library.css">

<?php
    $styles = ob_get_clean();
?>

<!-- ---------------------------------------------------------------------------------------- -->
<!-- ---------------------------------------------------------------------------------------- -->

<!-- CONTENT -->
<?php
    ob_start();
?>

<!-- Main Content -->
<section id="library">
    <!-- Display messages -->
    <?php
        include_once 'utils/display_message.php';
        displayMessage();
    ?>
    
    <div class="breadcrumb">
        <h1>The Library</h1>
        <p>Filter results</p>
    </div>

    <div class="library-content">
        <div class="all-books">
            <?php if($books-> num_rows > 0): ?>
                <?php foreach($books as $book): ?>
                    <!-- Get details for each genre and author based on their id -->
                    <?php
                        $genre = getSingleFromTable('genre', $book['genre_id']);
                        $bookAuthor = getSingleFromTable('author', $book['author_id']);
                    ?>

                    <div class="book">
                        <div class="picture">
                            <img src="<?php echo $book['cover_picture'] ?>" alt="book pic">
                        </div>

                        <div class="details">
                            <a href="/library/book?id=<?php echo $book['id']; ?>"><?php echo $book['book_name']?></a>
                            
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
                <p class="no-content">No books are available.</p>
            <?php endif ?>
        </div>

    </div>
</section>

<?php
    $content = ob_get_clean();
    include_once 'base.php';
?>