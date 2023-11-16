
<!-- HEADER -->
<?php    
    // Import script to process sign up
    require 'backend/user/change_password.php'; 

    $pageTitle = 'Profile';
    ob_start();
?>

<!-- Styles -->
<link rel="stylesheet" href="/frontend/styles/form-section.css">
<link rel="stylesheet" href="/frontend/styles/forms.css">

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
<section id="form-section">
    <!-- Display messages -->
    <?php
        // include 'utils/display_message.php';
        // displayMessage();
    ?>
    
    <div class="hero-img">
        <img src="/frontend/assets/images/hero/profile-hero.jpg" alt="hero-image">
    </div>

    <form action="" method="post" id="form">

        <div class="title-container">
            <h1 class="title">Change Password</h1>
            <div class="line"></div><br>
        </div>

        <div class="form-field">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Ex. johndoe@gmail.com" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : '';?>" required readonly>
        </div>

        <div class="form-field">
            <label for="password">Old Password</label>
            <input type="password" name="old-password" id="old-password" placeholder="At least 8 characters. Ex. John@2023" value="<?php echo isset($oldPassword) ? $oldPassword : '';?>" required>
        </div>

        <div class="form-field">
            <label for="confirm-password">New Password</label>
            <input type="password" name="new-password" id="new-password" placeholder="At least 8 characters. Ex. John@2023" value="<?php echo isset($newPassword) ? $newPassword : '';?>" required>
        </div>

        <div class="form-field">
            <label for="confirm-password">Confirm Password</label>
            <input type="password" name="confirm-password" id="confirm-password" placeholder="At least 8 characters. Ex. John@2023" value="<?php echo isset($confirmPassword) ? $confirmPassword : '';?>" required>
        </div>

        <div class="submit">
            <input type="submit" name="submit" value="Save Changes">
        </div>
    </form>
</section>

<?php
    $content = ob_get_clean();
    include 'base.php';
?>