<?php
    require_once 'backend/author/delete_author.php';
    require_once 'backend/generic/get_single_from_table.php';

    // Get id from url
    $id = $_GET['id'];
    $author = getSingleFromTable('author', $id);
    ob_start();
?>

<?php if($author):?>
    <form action="" method="post">
        <div class="title-container">
            <h1 class="title">Delete author</h1>
            <div class="line"></div><br>
        </div>
    
        <div class="delete-query">
            <p class="query">Are you sure you want to delete this author?</p>

            <div class="details">
                <p><b>Author id: </b><?php echo $author['id']?></p>
                <p><b>Name: </b><?php echo $author['author_name']?></p>
                <p><b>Author Picture: </b><a href="<?php echo $author['author_picture']?>"><?php echo $author['author_picture']?></a></p>
            </div>
        </div>
    
        <div class="submit">
            <a href="/admin/authors" class="button">Cancel</a>
            <input type="submit" name="submit" value="Delete" style="background-color: rgb(255, 40, 50)">
        </div>
    </form>
    
<?php else:?>
    <form>
        <p class="no-row">This author does not exist</p>
    </form>

<?php endif?>


<?php
    $form = ob_get_clean();
    include_once 'authors-page.php';
?>

