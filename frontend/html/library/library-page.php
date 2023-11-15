
<!-- HEADER -->
<?php
    require 'backend/generic/get_all_from_table.php';
    require 'backend/generic/get_single_from_table.php';

    $genres = getAllFromTable('genre');
    $books = getAllFromTable('book');

    $pageTitle = 'Library';
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
        include 'utils/display_message.php';
        displayMessage();
    ?>
    
    <div class="breadcrumb">
        <h1>The Library</h1>
        <p>Explore the books and apply to borrow any one of them as you wish.</p>
    </div>

    <div class="library-content">
        <!-- FILTER FORM -->
        <div class="filter-form-container">
            <form action="" method="post" class="filter-form">
                <div class="form-field">
                    <label for="genre">Filter by genre:</label>
                    <select name="genre" id="genre" >
                        <option value="null" selected>None Selected</option>
                        <?php if ($genres->num_rows > 0): ?>
                            <!-- Loop through the list of genres -->
                            <?php foreach ($genres as $genre): ?>
                                <option value="<?php echo $genre['id']; ?>"><?php echo $genre['genre_name']; ?></option>
                            <?php endforeach?>
                        <?php else: ?>
                            <option value="">No genres in database</option>
                        <?php endif?>
                    </select>
                </div>

                <div class="submit">
                    <input type="submit" name="submit" value="Filter">
                </div>
            </form>
        </div>

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
                            <!-- <p><b>Name: </b><?php echo $book['book_name']?></p> -->
                            <!-- <p><b>Quantity Available: </b><?php echo $book['quantity_available']?></p> -->
                            
                            <a href="/library/book?id=<?php echo $book['id']; ?>"><?php echo $book['book_name']?></a>
                            
                            <p>
                                <b>Description</b>
                                <?php echo strlen($book['description']) > 80 ? substr($book['description'], 0, 80).'...' : $book['description']; ?>
                            </p>

                            <p>
                                <b>Written by</b>
                                <?php echo $bookAuthor['author_name']?>
                            </p>

                            <?php if ($book['quantity_available'] == 0): ?>
                                <br><hr><br>
                                <p>Sorry, this book is not available right now. Check back later</p>
                            <?php endif?>
                        </div>

                    </div>
                <?php endforeach ?>
            <?php else: ?>
                <p>No books are available. Try again later</p>
            <?php endif ?>
        </div>

    </div>
</section>

<?php
    $content = ob_get_clean();
    include 'base.php';
?>