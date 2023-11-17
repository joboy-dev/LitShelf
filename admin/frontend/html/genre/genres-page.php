<!-- HEADER -->
<?php
    require_once 'backend/generic/get_all_from_table.php'; 
    $genres = getAllFromTable('genre');
    
    $pageTitle = 'Genres';
    ob_start();
?>

<!-- Styles -->
<link rel="stylesheet" href="/admin/frontend/styles/admin-style.css">
<link rel="stylesheet" href="/admin/frontend/styles/forms.css">

<?php
    $styles = ob_get_clean();
?>

<!-- --------------------------------------------------------------------------------------- -->
<!-- --------------------------------------------------------------------------------------- -->

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

        // Process search form 
        if (isset($_POST['search'])) {
            include '../utils/conn.php';
            $searchTerm = htmlspecialchars($_POST['search-term']);
            
            // Check for author
            $checkQuery = "SELECT * FROM `genre` WHERE `genre_name`='$searchTerm'";
            $genres = mysqli_query($conn, $checkQuery);
        }
    ?>

    <!-- Check for genres in the database -->
    <div class="list-container">
        <h1>Genres</h1>

        <form action="" method="post" class="search-form">
            <div class="form-field">
                <!-- <label for="email">Email</label> -->
                <input type="text" name="search-term" id="search-term" placeholder="Search by genre name" value="<?php echo isset($searchTerm) ? $searchTerm : ''; ?>" required>
            </div>
        
            <div class="submit">
                <input type="submit" name="search" value="Search">
            </div>
        </form>

        <?php if ($genres->num_rows > 0): ?>
            <!-- Loop through the list of genres -->
            <?php foreach ($genres as $genre): ?>
                <div class="list">
                    <div class="actions">
                        <a href="/admin/genres/edit?id=<?php echo $genre['id']; ?>">📝 Edit</a>
                        <a href="/admin/genres/delete?id=<?php echo $genre['id']; ?>">❌ Delete</a>
                    </div>

                    <p><b>Genre id: </b><?php echo $genre['id']?></p>
                    <p><b>Genre Name: </b><?php echo $genre['genre_name']?></p>
                </div> 
            <?php endforeach?>
        <?php else: ?>
            <p class="no-rows">No genres in database</p>
        <?php endif?>
    </div>

    <?php 
       echo $form;
    ?>

</section>

<?php
    $content = ob_get_clean();
    include_once 'base.php';
?>