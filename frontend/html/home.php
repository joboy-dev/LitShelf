<!-- HEADER -->
<?php
    $pageTitle = 'Home';
    ob_start();
?>

<!-- Styles -->
<link rel="stylesheet" href="frontend/styles/home/home.css">

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
        <a href="/signup" class="button">Get Started</a>
    </div>

    <div class="hero-img">
        <img src="frontend/assets/images/home/home-hero.jpg" alt="hero-image">
    </div>
</section>

<section id="features">
    <div class="feature">
        <h1 class="icon">🔍</h1>
        <p class="feature-title">Explore books</p>
        <p class="description">Use our search feature to find interesting books.</p>
    </div>

    <div class="feature">
        <h1 class="icon">📖</h1>
        <p class="feature-title">Manage Your Borrowings</p>
        <p class="description">Keep track of the books you've borrowed and manage due dates effortlessly.</p>
    </div>

    <div class="feature">
        <h1 class="icon">🌟</h1>
        <p class="feature-title">Get Updates</p>
        <p class="description">Stay in the loop with notifications on new arrivals and library events.</p>
    </div>

</section>

<?php
    $content = ob_get_clean();
    include 'base.php';
?>