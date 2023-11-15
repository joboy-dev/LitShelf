<?php
    require 'backend/author/edit_author.php';
    require 'backend/generic/get_single_from_table.php';

    // Get id from url
    $id = $_GET['id'];
    $author = getSingleFromTable('author', $id);
    ob_start();
?>

<?php if($author):?>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="title-container">
            <h1 class="title">Edit Author Details</h1>
            <div class="line"></div><br>
        </div>
    
        <div class="form-field">
            <label for="name">Author name</label>
            <input type="name" name="name" id="name" placeholder="Author Name" value="<?php echo isset($author['author_name']) ? $author['author_name'] : '';?>" required>
        </div>

        <!-- <div class="form-field">
            <label for="picture">Profile Picture URL</label>
            <input type="url" name="picture" id="picture" placeholder="Profile Picture URL" value="<?php echo isset($author['author_picture']) ? $author['author_picture'] : '';?>">
        </div> -->

        <div class="form-field">
            <label for="picture">Author Picture</label>
            <input type="file" name="picture" id="picture">
        </div>
    
        <div class="submit">
            <input type="submit" name="submit" value="Edit">
        </div>
    </form>
    
<?php else:?>
    <form action="">
        <p class="no-rows">This author does not exist</p>
    </form>

<?php endif?>


<?php
    $form = ob_get_clean();
    include 'authors-page.php';
?>

