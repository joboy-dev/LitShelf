<?php
    require_once 'backend/genre/add_genre.php';
    ob_start();
?>

<form action="" method="post">
    <div class="title-container">
        <h1 class="title">Add Genre</h1>
        <div class="line"></div><br>
    </div>

    <div class="form-field">
        <label for="name">Genre Name</label>
        <input type="text" name="name" id="name" placeholder="Genre Name" value="<?php echo isset($name) ? $name : '';?>" required>
    </div>

    <div class="submit">
        <input type="submit" name="submit" value="Add Genre">
    </div>
</form>

<?php
    $form = ob_get_clean();
    include_once 'genres-page.php';
?>

