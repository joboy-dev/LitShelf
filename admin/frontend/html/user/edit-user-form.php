<?php
    require 'backend/user/edit_user.php';
    require 'backend/generic/get_single_from_table.php';

    // Get id from url
    $id = $_GET['id'];
    $user = getSingleFromTable('user', $id);
    ob_start();
?>

<?php if($user):?>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="title-container">
            <h1 class="title">Edit Details</h1>
            <div class="line"></div><br>
        </div>
    
        <div class="form-field">
            <label for="name">Full name</label>
            <input type="name" name="name" id="name" placeholder="Full Name" value="<?php echo isset($user['name']) ? $user['name'] : '';?>" required>
        </div>
    
        <div class="form-field">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Ex. johndoe@gmail.com" value="<?php echo isset($user['email']) ? $user['email'] : '';?>" required>
        </div>

        <!-- <div class="form-field">
            <label for="picture">Profile Picture URL</label>
            <input type="url" name="picture" id="picture" placeholder="Profile Picture URL" value="<?php echo isset($user['profile_picture']) ? $user['profile_picture'] : '';?>">
        </div> -->

        <!-- <div class="form-field">
            <label for="picture">Profile Picture</label>
            <input type="file" name="picture" id="picture">
        </div> -->

        <div class="submit">
            <input type="submit" name="submit" value="Edit">
        </div>
    </form>
    
<?php else:?>
    <form action="">
        <p class="no-rows">This user does not exist</p>
    </form>

<?php endif?>


<?php
    $form = ob_get_clean();
    include 'users-page.php';
?>

