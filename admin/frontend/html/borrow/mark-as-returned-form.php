<?php
    require_once 'backend/borrow/mark_as_returned.php';
    require_once 'backend/generic/get_single_from_table.php';
    
    // Get id from url
    $borrowId = $_GET['id'];
    $bookId = $_GET['book_id'];

    $book = getSingleFromTable('book', $bookId);
    $borrowRequest = getSingleFromTable('borrow', $borrowId);
    $requestUser = getSingleFromTable('user', $borrowRequest['user_id']);
    ob_start();
?>

<?php if($book and $borrowRequest):?>
    <form action="" method="post">
        <div class="title-container">
            <h1 class="title">Mark as Returned</h1>
            <div class="line"></div><br>
        </div>
    
        <div class="delete-query">
            <p class="query">Do you want to mark borrowed book as returned for this user?</p>

            <div class="details">
                <p><b>Book Name: </b><?php echo $book['book_name']?></p>
                <p><b>Borrowed by: </b><?php echo $requestUser['name']?></p>
                <p><b></b><?php echo $requestUser['email']?></p>
            </div>
        </div>
    
        <div class="submit">
            <a href="/admin/book-requests" class="button">Cancel</a>
            <input type="submit" name="submit" value="Approve" style="background-color: rgb(40, 150, 50)">
        </div>
    </form>
    
<?php else:?>
    <form>
        <p class="no-row">This request is invalid</p>
    </form>

<?php endif?>


<?php
    $form = ob_get_clean();
    include_once 'borrowed-books-page.php';
?>

