<?php
    // require 'backend/genre/get_single_genre.php';
    require 'backend/genre/edit_genre.php';
    require 'backend/generic/get_single_from_table.php';

    // Get id from url
    $id = $_GET['id'];
    $genre = getSingleFromTable('genre', $id);
    ob_start();
?>

<?php if($genre):?>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="title-container">
            <h1 class="title">Edit genre Details</h1>
            <div class="line"></div><br>
        </div>
    
        <div class="form-field">
            <label for="name">Genre Name</label>
            <input type="name" name="name" id="name" placeholder="Genre Name" value="<?php echo isset($genre['genre_name']) ? $genre['genre_name'] : '';?>" required>
        </div>
    
        <div class="submit">
            <input type="submit" name="submit" value="Edit">
        </div>
    </form>
    
<?php else:?>
    <form action="">
        <p class="no-rows">This genre does not exist</p>
    </form>

<?php endif?>


<?php
    $form = ob_get_clean();
    include 'genres-page.php';
?>

