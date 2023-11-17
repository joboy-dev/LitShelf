<!-- HEADER -->
<?php
    require_once 'backend/borrow/book_requests.php';
    require_once 'backend/generic/get_single_from_table.php';

    $bookRequests = getUnapprovedRequests();

    $pageTitle = 'Book Requests';
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
        // include_once '../utils/display_message.php';
        // displayMessage();

        if (isset($_POST['search'])) {
            include '../utils/conn.php';
            $searchTerm = htmlspecialchars($_POST['search-term']);
            
            // Check for user through email entered by user
            $checkUserQuery = "SELECT * FROM `user` WHERE `email`='$searchTerm'";
            $users = mysqli_query($conn, $checkUserQuery);

            // Get the user object
            foreach ($users as $user) {
                // Check for the books borrowed by the user based on the user id
                $userId = $user["id"];
                $checkBookRequestsQuery = "SELECT * FROM `borrow` WHERE `user_id`='$userId' AND `approved`=0";

                $bookRequests = mysqli_query($conn, $checkBookRequestsQuery);
            }
        }
    ?>

    <!-- Check for book requests in the database -->
    <div class="list-container">
        <h1>Book Requests</h1>

        <form action="" method="post" class="search-form">
            <div class="form-field">
                <!-- <label for="email">Email</label> -->
                <input type="email" name="search-term" id="search-term" placeholder="Search by user email" value="<?php echo isset($searchTerm) ? $searchTerm : ''; ?>" required>
            </div>
        
            <div class="submit">
                <input type="submit" name="search" value="Search">
            </div>
        </form>

        <?php if ($bookRequests->num_rows > 0): ?>
            <!-- Loop through the list of book requests -->
            <?php foreach ($bookRequests as $bookRequest): ?>
                <!-- Get details for each user and book based on their id -->
                <?php
                    $user = getSingleFromTable('user', $bookRequest['user_id']);
                    $book = getSingleFromTable('book', $bookRequest['book_id']);
                ?>

                <div class="list">
                    <div class="actions">
                        <a href="/admin/book-requests/approve?id=<?php echo $bookRequest['id']; ?>&book_id=<?php echo $bookRequest['book_id']; ?>">✅ Approve</a>
                    </div>

                    <p><b>Book Request id: </b><?php echo $bookRequest['id']?></p>
                    <p>
                        <b>User: </b>
                        <?php echo $user['name']?> <b>(id-<?php echo $bookRequest['user_id']?>)</b>
                    </p>
                    <p><b>User Email: </b><?php echo $user['email']?></p>
                    <p>
                        <b>Book: </b><?php echo $book['book_name']?> <b>(id-<?php echo $bookRequest['book_id']?>)</b>
                    </p>
                    <p><b>Request Date: </b><?php echo $bookRequest['borrow_date']?></p>
                </div> 
            <?php endforeach?>
        <?php else: ?>
            <p class="no-rows">No new requests have been made</p>
        <?php endif?>
    </div>

    <?php echo isset($form) ? $form : "<form></form>"; ?>

</section>

<?php
    $content = ob_get_clean();
    include_once 'base.php';
?>