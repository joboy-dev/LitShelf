
<!-- HEADER -->
<?php    
    // Import script to process sign up
    $pageTitle = 'None';
    ob_start();
?>

<!-- Styles -->
<link rel="stylesheet" href="/frontend/styles/page-not-found.css">

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
<section id="page-not-found">
    
    <div class="hero-img">
        <img src="/frontend/assets/images/hero/404-page-hero.png" alt="hero-image">
    </div>

    <div class="page">
        <h1>Oops! <br> Seems you're on the wrong page</h1>
        <h3></h3>
        <p>This page does not exist</p>

        <a href="/" class="button">Go back home</a>
        
    </div>
</section>

<?php
    $content = ob_get_clean();
    include 'base.php';
?>