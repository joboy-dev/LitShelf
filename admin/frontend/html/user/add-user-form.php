<?php
    require_once 'backend/user/add_user.php';
    ob_start();
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="title-container">
        <h1 class="title">Add User</h1>
        <div class="line"></div><br>
    </div>

    <div class="form-field">
        <label for="name">Full name</label>
        <input type="name" name="name" id="name" placeholder="Full Name" value="<?php echo isset($name) ? $name : '';?>" required>
    </div>

    <div class="form-field">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Ex. johndoe@gmail.com" value="<?php echo isset($email) ? $email : '';?>" required>
    </div>

    <div class="form-field">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="At least 8 characters. Ex. John@2023" value="<?php echo isset($password) ? $password : '';?>" required>
    </div>

    <div class="form-field">
        <label for="confirm-password">Confirm Password</label>
        <input type="password" name="confirm-password" id="confirm-password" placeholder="At least 8 characters. Ex. John@2023" value="<?php echo isset($confirmPassword) ? $confirmPassword : '';?>" required>
    </div>

    <!-- <div class="form-field">
        <label for="picture">Profile Picture URL</label>
        <input type="url" name="picture" id="picture" placeholder="Profile Picture URL" value="<?php echo isset($profilePicture) ? $profilePicture : '';?>">
    </div> -->

    <!-- <div class="form-field">
        <label for="picture">Profile Picture</label>
        <input type="file" name="picture" id="picture">
    </div> -->

    <div class="submit">
        <input type="submit" name="submit" value="Add User">
    </div>
</form>

<?php
    $form = ob_get_clean();
    include 'users-page.php';
?>

