<?php
    require_once 'backend/author/add_author.php';
    ob_start();
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="title-container">
        <h1 class="title">Add Author</h1>
        <div class="line"></div><br>
    </div>

    <div class="form-field">
        <label for="name">Full name</label>
        <input type="text" name="name" id="name" placeholder="Author Name" value="<?php echo isset($name) ? $name : '';?>" required>
    </div>

    <!-- <div class="form-field">
        <label for="picture">Author Picture</label>
        <input type="url" name="picture" id="picture" placeholder="Author Picture URL" value="<?php echo isset($authorPicture) ? $authorPicture : '';?>">
    </div> -->

    <div class="form-field">
        <label for="picture">Author Picture</label>
        <input type="file" name="picture" id="picture">
    </div>

    <div class="submit">
        <input type="submit" name="submit" value="Add Author">
    </div>
</form>

<?php
    $form = ob_get_clean();
    include_once 'authors-page.php';
?>

