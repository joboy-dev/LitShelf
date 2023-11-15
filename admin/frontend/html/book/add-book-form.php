<?php
    require_once 'backend/book/add_book.php';
    require_once 'backend/generic/get_all_from_table.php';

    $genres = getAllFromTable('genre');
    $authors = getAllFromTable('author');
    
    ob_start();
?>

<form action="" method="post" enctype="multipart/form-data" style="height: 100%; padding-top: 10%;">
    <?php
    ?>
    
    <div class="title-container">
        <h1 class="title">Add Book</h1>
        <div class="line"></div><br>
    </div>

    <div class="form-field">
        <label for="name">Book name</label>
        <input type="text" name="name" id="name" placeholder="Book Name" value="<?php echo isset($name) ? $name : '';?>" required>
    </div>

    <div class="form-field">
        <label for="description">Description (3000 characters max.)</label>
        <textarea name="description" id="description" maxlength="3000" required><?php echo isset($description) ? $description : '';?></textarea>
    </div>

    <div class="form-field">
        <label for="author">Author</label>
        <select name="author" id="author">
            <option value="null" selected>None Selected</option>
            <?php if ($authors->num_rows > 0): ?>
                <!-- Loop through the list of authors -->
                <?php foreach ($authors as $author): ?>
                    <option value="<?php echo $author['id']; ?>"><?php echo $author['author_name']; ?></option>
                <?php endforeach?>
            <?php else: ?>
                <option value="">No authors in database</option>
            <?php endif?>
        </select>
    </div>
                
    <div class="form-field">
        <label for="genre">Genre</label>
        <select name="genre" id="genre" >
            <option value="null" selected>None Selected</option>
            <?php if ($genres->num_rows > 0): ?>
                <!-- Loop through the list of genres -->
                <?php foreach ($genres as $genre): ?>
                    <option value="<?php echo $genre['id']; ?>"><?php echo $genre['genre_name']; ?></option>
                <?php endforeach?>
            <?php else: ?>
                <option value="">No genres in database</option>
            <?php endif?>
        </select>
    </div>
    
    <div class="form-field">
        <label for="quantity">Quantity Available</label>
        <input type="number" name="quantity" id="quantity" placeholder="Quantity Available" value="<?php echo isset($quantity) ? $quantity : '';?>" required>
    </div>
    
    <div class="form-field">
        <label for="picture">Upload Book Cover Picture</label>
        <input type="file" name="picture" id="picture">
    </div>
    <!-- <div class="form-field">
        <label for="picture">Book Picture</label>
        <input type="url" name="picture" id="picture" placeholder="Book Picture URL" value="<?php echo isset($bookPicture) ? $bookPicture : '';?>">
    </div> -->
    
    <div class="submit">
        <input type="submit" name="submit" value="Add Book">
    </div>
</form>

<?php
    $form = ob_get_clean();
    include 'books-page.php';
?>

