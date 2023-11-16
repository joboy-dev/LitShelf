
<!-- HEADER -->
<?php    
    // Import script to process edit profile
    require 'backend/user/edit_profile.php'; 

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
            <h1 class="title">Edit Profile</h1>
            <div class="line"></div><br>
        </div>

        <div class="form-field">
            <label for="name">Full Name</label>
            <input type="text" name="name" id="name" placeholder="Full Name" value="<?php echo isset($_SESSION['name']) ? $_SESSION['name'] : '';?>" required>
        </div>

        <div class="form-field">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Ex. johndoe@gmail.com" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : '';?>" required>
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