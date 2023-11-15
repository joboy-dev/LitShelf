<?php
    require_once 'backend/book/delete_book.php';
    require_once 'backend/generic/get_single_from_table.php';
    
    // Get id from url
    $id = $_GET['id'];
    $book = getSingleFromTable('book', $id);
    ob_start();
?>

<?php if($book):?>
    <form action="" method="post">
        <div class="title-container">
            <h1 class="title">Delete book</h1>
            <div class="line"></div><br>
        </div>
    
        <div class="delete-query">
            <p class="query">Are you sure you want to delete this book?</p>

            <div class="details">
                <p><b>Book id: </b><?php echo $book['id']?></p>
                <p><b>Book Name: </b><?php echo $book['book_name']?></p>
                <p><b>Book Cover Picture: </b><a href="<?php echo $book['cover_picture']?>"><?php echo $book['cover_picture']?></a></p>
            </div>
        </div>
    
        <div class="submit">
            <a href="/admin/books" class="button">Cancel</a>
            <input type="submit" name="submit" value="Delete" style="background-color: rgb(255, 40, 50)">
        </div>
    </form>
    
<?php else:?>
    <form>
        <p class="no-row">This book does not exist</p>
    </form>

<?php endif?>


<?php
    $form = ob_get_clean();
    include 'books-page.php';
?>

