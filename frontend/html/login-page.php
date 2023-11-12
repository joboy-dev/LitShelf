<!-- HEADER -->
<?php
    // Import script to process login
    require 'backend/authentication/login.php'; 
    $pageTitle = 'Login';
    ob_start();
?>

<!-- Styles -->
<link rel="stylesheet" href="/frontend/styles/signup-login.css">
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
<section id="signup-login">
    <!-- Display messages -->
    <?php
        include 'backend/utils/display_message.php';
        displayMessage();
    ?>

    <div class="hero-img">
        <img src="/frontend/assets/images/hero/login-hero.jpg" alt="hero-image">
    </div>

    <form action="#" method="post">
        <div class="title-container">
            <h1 class="title">Login</h1>
            <div class="line"></div><br>
        </div>

        <div class="form-field">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Ex. johndoe@gmail.com" value="<?php echo isset($email) ? $email : '';?>" required>
        </div>

        <div class="form-field">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Password" value="<?php echo isset($password) ? $password : '';?>" required>
        </div>

        <div class="submit">
            <input type="submit" name="submit" value="Login">
        </div>
    </form>

</section>

<?php
    $content = ob_get_clean();
    include 'base.php';
?>