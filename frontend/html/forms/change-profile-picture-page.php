
<!-- HEADER -->
<?php    
    // Import script to process change of profile picture
    require 'backend/user/change_profile_picture.php'; 

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

    <form action="" method="post" id="form" enctype="multipart/form-data">

        <div class="title-container">
            <h1 class="title">Change Profile Picture</h1>
            <div class="line"></div><br>
        </div>

        <div class="form-field">
            <label for="picture">Profile Picture</label>
            <input type="file" name="picture" id="picture" required>
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