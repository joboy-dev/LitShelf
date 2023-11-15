<!-- HEADER -->
<?php
    require_once 'backend/generic/get_all_from_table.php'; 
    $users = getAllFromTable('user');
    
    $pageTitle = 'Users';
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
        displayMessage();
    ?>


<!-- Check for users in the database -->
    <div class="list-container">
        <h1>Users</h1>
        <?php if ($users->num_rows > 0): ?>
            <!-- Loop through the list of authors -->
            <?php foreach ($users as $user): ?>
                <div class="list">
                    <div class="actions">
                        <a href="/admin/users/edit?id=<?php echo $user['id']; ?>">📝 Edit</a>
                        <a href="/admin/users/delete?id=<?php echo $user['id']; ?>">❌ Delete</a>
                    </div>

                    <p><b>User id: </b><?php echo $user['id']?></p>
                    <p><b>Name: </b><?php echo $user['name']?></p>
                    <p><b>Email: </b><?php echo $user['email']?></p>
                    <p><b>Password: </b><?php echo $user['password']?></p>
                    <div class="picture-container">
                        <?php if(str_contains($user['profile_picture'], 'https://')):?>
                            <p><b>Profile Picture: </b><a target="_blank" href="<?php echo $user['profile_picture']?>"><?php echo $user['profile_picture']?></a></p>
                            <img src="<?php echo $user['profile_picture']?>" alt="pic">
                        <?php else:?>
                            <p><b>Profile Picture: </b><a target="_blank" href="<?php echo '../'.$user['profile_picture']?>"><?php echo $user['profile_picture']?></a></p>
                            <img src="<?php echo '../'.$user['profile_picture']?>" alt="pic">
                        <?php endif?>
                    </div>
                </div> 
            <?php endforeach?>
        <?php else: ?>
            <p class="no-rows">No users in database</p>
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