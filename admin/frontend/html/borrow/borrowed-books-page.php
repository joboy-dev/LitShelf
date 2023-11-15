<!-- HEADER -->
<?php
    require_once 'backend/borrow/book_requests.php';
    require_once 'backend/generic/get_single_from_table.php';

    $borrowedBooks = getUnreturnedBooks();

    $pageTitle = 'Borrowed Books';
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
        include_once '../utils/display_message.php';
        displayMessage();
    ?>

    <!-- Check for book requests in the database -->
    <div class="list-container">
        <h1>Borrowed Books</h1>
        <?php if ($borrowedBooks->num_rows > 0): ?>
            <!-- Loop through the list of book requests -->
            <?php foreach ($borrowedBooks as $borrowedBook): ?>
                <!-- Get details for each user and book based on their id -->
                <?php
                    $user = getSingleFromTable('user', $borrowedBook['user_id']);
                    $book = getSingleFromTable('book', $borrowedBook['book_id']);
                ?>

                <div class="list">
                    <div class="actions">
                        <a href="/admin/borrowed-books/return?id=<?php echo $borrowedBook['id']; ?>&book_id=<?php echo $borrowedBook['book_id']; ?>">✅ Mark as returned</a>
                    </div>

                    <p><b>Book Request id: </b><?php echo $borrowedBook['id']?></p>
                    <p>
                        <b>Book: </b><?php echo $book['book_name']?> <b>(id-<?php echo $borrowedBook['book_id']?>)</b>
                    </p>
                    <p>
                        <b>User: </b>
                        <?php echo $user['name']?> <b>(id-<?php echo $borrowedBook['user_id']?>)</b>
                    </p>
                    <p><b>User Email: </b><?php echo $user['email']?></p>
                    <p><b>Borrow Date: </b><?php echo $borrowedBook['borrow_date']?></p>
                </div> 
            <?php endforeach?>
        <?php else: ?>
            <p class="no-rows">No books have been borrowed</p>
        <?php endif?>
    </div>

    <?php echo isset($form) ? $form : "<form></form>"; ?>

</section>

<?php
    $content = ob_get_clean();
    include_once 'base.php';
?>