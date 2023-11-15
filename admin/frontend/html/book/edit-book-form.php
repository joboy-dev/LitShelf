<?php
    require_once 'backend/generic/get_single_from_table.php';
    require_once 'backend/generic/get_all_from_table.php';
    require_once 'backend/book/edit_book.php';
    
    // Get id from url
    $id = $_GET['id'];
    $book = getSingleFromTable('book', $id);
    
    $authors = getAllFromTable('author');
    $genres = getAllFromTable('genre');
    ob_start();
?>


<?php if($book):?>
    <form action="" method="post" enctype="multipart/form-data" style="height: 100%; padding-top: 10%;">
        <div class="title-container">
            <h1 class="title">Edit Book</h1>
            <div class="line"></div><br>
        </div>
    
        <div class="form-field">
            <label for="name">Book name</label>
            <input type="text" name="name" id="name" placeholder="Book Name" value="<?php echo isset($book['book_name']) ? $book['book_name'] : '';?>" required>
        </div>``

        <div class="form-field">
            <label for="description">Description (3000 characters max.)</label>
            <textarea name="description" id="description" maxlength="3000" required><?php echo isset($book['description']) ? $book['description'] : '';?></textarea>
        </div>

        
        <div class="form-field">
            <label for="author">Author</label>
            <select name="author" id="author">
                <option value="null">None Selected</option>

                <?php if ($authors->num_rows > 0): ?>
                    <!-- Loop through the list of authors -->
                    <?php foreach ($authors as $author): ?>
                        <?php $selected = ($author['id'] == $book['author_id']) ? 'selected' : ''; ?>
                        <option value="<?php echo $author['id']; ?>" <?php echo $selected; ?>>
                            <?php echo $author['author_name']; ?>
                        </option>
                    <?php endforeach?>
                <?php else: ?>
                    <option value="null">No authors in database</option>
                <?php endif?>
            </select>
        </div>
                    
        <div class="form-field">
            <label for="genre">Genre</label>
            <select name="genre" id="genre" >
                <option value="null">None Selected</option>

                <?php if ($genres->num_rows > 0): ?>
                    <!-- Loop through the list of genres -->
                    <?php foreach ($genres as $genre): ?>
                        <!-- Check for the genre id that is in the backend -->
                        <?php $selected = ($genre['id'] == $book['genre_id']) ? 'selected' : '';?>
                        <option value="<?php echo $genre['id']; ?>" <?php echo $selected; ?>>
                            <?php echo $genre['genre_name']; ?>
                        </option>
                    <?php endforeach?>
                <?php else: ?>
                    <option value="null">No genres in database</option>
                <?php endif?>
            </select>
        </div>
        
        <div class="form-field">
            <label for="quantity">Quantity Available</label>
            <input type="number" name="quantity" id="quantity" placeholder="Quantity Available" value="<?php echo isset($book['quantity_available']) ? $book['quantity_available'] : '';?>" required>
        </div>
        
        <div class="form-field">
            <label for="picture">Upload Book Cover Picture</label>
            <input type="file" name="picture" id="picture">
        </div>
    
        <div class="submit">
            <input type="submit" name="submit" value="Edit">
        </div>
    </form>
    
<?php else:?>
    <form action="">
        <p class="no-rows">This book does not exist</p>
    </form>

<?php endif?>


<?php
    $form = ob_get_clean();
    include 'books-page.php';
?>

