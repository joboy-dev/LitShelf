<!-- HEADER -->
<?php
    $pageTitle = 'Sign Up';
    ob_start();
?>

<!-- Styles -->
<link rel="stylesheet" href="/frontend/styles/signup/signup.css">

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
<section id="hero">
    <div class="hero-content">
        <h1>Welcome to LitShelf Online Library!</h1>
        <h3>📚 Explore, Discover, and Immerse Yourself in the World of Books 🌍</h3>
        <a href="#" class="button">Get Started</a>
    </div>

    <div class="hero-img">
        <img src="/frontend/assets/images/home/home-hero.jpg" alt="hero-image">
    </div>
</section>

<?php
    $content = ob_get_clean();
    include 'base.php';
?>