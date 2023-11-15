<?php
    require_once 'backend/genre/delete_genre.php';
    require_once 'backend/generic/get_single_from_table.php';

    // Get id from url
    $id = $_GET['id'];
    $genre = getSingleFromTable('genre', $id);
    ob_start();
?>

<?php if($genre):?>
    <form action="" method="post">
        <div class="title-container">
            <h1 class="title">Delete genre</h1>
            <div class="line"></div><br>
        </div>
    
        <div class="delete-query">
            <p class="query">Are you sure you want to delete this genre?</p>

            <div class="details">
                <p><b>Genre id: </b><?php echo $genre['id']?></p>
                <p><b>Genre Name: </b><?php echo $genre['genre_name']?></p>
            </div>
        </div>
    
        <div class="submit">
            <a href="/admin/genres" class="button">Cancel</a>
            <input type="submit" name="submit" value="Delete" style="background-color: rgb(255, 40, 50)">
        </div>
    </form>
    
<?php else:?>
    <form>
        <p class="no-row">This genre does not exist</p>
    </form>

<?php endif?>


<?php
    $form = ob_get_clean();
    include_once 'genres-page.php';
?>

