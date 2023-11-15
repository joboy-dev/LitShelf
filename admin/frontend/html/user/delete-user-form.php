<?php
    require_once 'backend/user/delete_user.php';
    require_once 'backend/generic/get_single_from_table.php';

    // Get id from url
    $id = $_GET['id'];
    $user = getSingleFromTable('user', $id);
    ob_start();
?>

<?php if($user):?>
    <form action="" method="post">
        <div class="title-container">
            <h1 class="title">Delete User</h1>
            <div class="line"></div><br>
        </div>
    
        <div class="delete-query">
            <p class="query">Are you sure you want to delete this user?</p>

            <div class="details">
                <p><b>User id: </b><?php echo $user['id']?></p>
                <p><b>Name: </b><?php echo $user['name']?></p>
                <p><b>Email: </b><?php echo $user['email']?></p>
                <p><b>Password: </b><?php echo $user['password']?></p><br>
                <p><b>Profile Picture: </b><a href="<?php echo $user['profile_picture']?>"><?php echo $user['profile_picture']?></a></p>
            </div>
        </div>
    
        <div class="submit">
            <a href="/admin/users" class="button">Cancel</a>
            <input type="submit" name="submit" value="Delete" style="background-color: rgb(255, 40, 50)">
        </div>
    </form>
    
<?php else:?>
    <form action="">
        <p class="no-rows">This user does not exist</p>
    </form>

<?php endif?>


<?php
    $form = ob_get_clean();
    include_once 'users-page.php';
?>

