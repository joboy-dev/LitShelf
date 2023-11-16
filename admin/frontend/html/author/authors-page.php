<!-- HEADER -->
<?php
    require_once 'backend/generic/get_all_from_table.php'; 
    $authors = getAllFromTable('author');
    
    $pageTitle = 'Authors';
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
        include_once '../utils/display_message.php';
        // displayMessage();
    ?>

    <!-- Check for authors in the database -->
    <div class="list-container">
        <h1>Authors</h1>
        <?php if ($authors->num_rows > 0): ?>
            <!-- Loop through the list of authors -->
            <?php foreach ($authors as $author): ?>
                <div class="list">
                    <div class="actions">
                        <a href="/admin/authors/edit?id=<?php echo $author['id']; ?>">📝 Edit</a>
                        <a href="/admin/authors/delete?id=<?php echo $author['id']; ?>">❌ Delete</a>
                    </div>

                    <p><b>Author id: </b><?php echo $author['id']?></p>
                    <p><b>Name: </b><?php echo $author['author_name']?></p>

                    <!-- <div class="picture-container">
                        <?php if(str_contains($author['author_picture'], 'https://')):?>
                            <p><b>Author Picture: </b><a target="_blank" href="<?php echo $author['author_picture']?>"><?php echo $author['author_picture']?></a></p>
                            <img src="<?php echo $author['author_picture']?>" alt="pic">
                        <?php else:?>
                            <p><b>Author Picture: </b><a target="_blank" href="<?php echo '../'.$author['author_picture']?>"><?php echo $author['author_picture']?></a></p>
                            <img src="<?php echo '../'.$author['author_picture']?>" alt="pic">
                        <?php endif?>
                    </div> -->

                    <div class="picture-container">
                        <p><b>Author Picture: </b><a href="<?php echo $author['author_picture']?>"><?php echo $author['author_picture']?></a></p>
                        <img src="<?php echo $author['author_picture']?>" alt="pic">
                    </div>
                </div> 
            <?php endforeach?>
        <?php else: ?>
            <p class="no-rows">No authors in database</p>
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