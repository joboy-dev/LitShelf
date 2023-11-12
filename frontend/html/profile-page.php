
<!-- HEADER -->
<?php    
    // Import script to process sign up
    $pageTitle = 'Profile';
    ob_start();
?>

<!-- Styles -->
<link rel="stylesheet" href="/frontend/styles/profile.css">
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
<section id="profile">
    <div class="hero-img">
        <img src="/frontend/assets/images/hero/profile-hero.jpg" alt="hero-image">
    </div>

    <div class="user-details">
        <div class="title-container">
            <h1 class="title">Profile</h1>
            <div class="line"></div><br>
        </div>

        <div class="profile-picture">
            <img src="<?php echo $_SESSION['profile_picture']?>" alt="<?php echo $_SESSION['name'] . 'picture'; ?>">
        </div>

        <div class="detail">
            <h3>Name:</h3>
            <p><?php echo $_SESSION['name'] ?></p>
        </div>

        <div class="detail">
            <h3>Email:</h3>
            <p><?php echo $_SESSION['email'] ?></p>
        </div>

        <a href="#" class="button">Edit Profile</a>
    </div>
</section>

<?php
    $content = ob_get_clean();
    include 'base.php';
?>