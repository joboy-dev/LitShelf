
<!-- HEADER -->
<?php    
    // Import script to process sign up
    require 'backend/user/signup.php'; 

    $pageTitle = 'Sign Up';
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
        <img src="/frontend/assets/images/hero/signup-hero.jpg" alt="hero-image">
    </div>

    <form action="" method="post" id="form">

        <div class="title-container">
            <h1 class="title">Sign Up</h1>
            <div class="line"></div><br>
        </div>

        <div class="form-field">
            <label for="name">Full Name</label>
            <input type="text" name="name" id="name" placeholder="Full Name" value="<?php echo isset($name) ? $name : '';?>" required>
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

        <div class="submit">
            <input type="submit" name="submit" value="Sign Up">
        </div>

        <p class="account-query">Already have an account? <span><a href="/login">Login</a></span></p>
    </form>
</section>

<?php
    $content = ob_get_clean();
    include 'base.php';
?>