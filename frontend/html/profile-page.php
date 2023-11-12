
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
    <!-- Display messages -->
    <?php
        include 'utils/display_message.php';
        displayMessage();
    ?>
    
    <div class="hero-img">
        <img src="/frontend/assets/images/hero/profile-hero.jpg" alt="hero-image">
    </div>

    <div class="user-details">
        <div class="heading">
            <div class="title-container">
                <h1 class="title">Profile</h1>
                <div class="line"></div><br>
            </div>

            <div class="settings-container">
                <p class="settings">⚙️Settings</p>
    
                <div class="settings-links none">
                    <a href="/edit-profile"> 📝 Edit Profile</a>
                    <a href="/change-password">🔒 Change Password</a>
                    <a href="#">👤 Change Profile Picture</a>
                </div>
            </div>

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
    </div>
</section>

<script>
    var settingsContainer = document.querySelector('.settings-container')
    var allSettings = document.querySelector('.settings-links')

    function openSettings() {
        allSettings.classList.remove('none');
    }

    function closeSettings() {
        allSettings.classList.add('none')
    }

    settingsContainer.addEventListener('mouseover', openSettings)
    settingsContainer.addEventListener('mouseout', closeSettings)
</script>

<?php
    $content = ob_get_clean();
    include 'base.php';
?>