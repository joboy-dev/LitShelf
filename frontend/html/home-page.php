<!-- HEADER -->
<?php
    require_once 'backend/contact/process_contact_form.php';
    
    $pageTitle = 'Home';
    ob_start();
?>

<!-- Styles -->
<link rel="stylesheet" href="<?php echo '/frontend/styles/home.css'; ?>">
<link rel="stylesheet" href="<?php echo '/frontend/styles/forms.css'; ?>">

<?php
    $styles = ob_get_clean();
?>

<!-- -------------------------------------------------------------------------------------- -->
<!-- -------------------------------------------------------------------------------------- -->

<!-- CONTENT -->
<?php
    ob_start();
?>

<!-- Main Content -->
<section id="hero">
    <!-- Display messages -->
    <?php
        include 'utils/display_message.php';
        displayMessage();
    ?>
    
    <div class="hero-content">
        <h1>Welcome to LitShelf Online Library!</h1>
        <h3>📚 Explore, Discover, and Immerse Yourself in the World of Books 🌍</h3>

        <?php if(!isset($_SESSION['user_id'])): ?>
            <a href="/signup" class="button">Get Started</a>
        <?php else: ?>
            <a href="/library" class="button">Visit the Library</a>
        <?php endif ?>
    </div>

    <div class="hero-img">
        <img src="<?php echo '/frontend/assets/images/hero/home-hero.jpg' ?>" alt="hero-image">
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

<section id="contact">
    <form action="" method="post">
        <div class="title-container">
            <h1 class="title">Contact</h1>
            <div class="line"></div><br>
        </div>

        <div class="form-field">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" placeholder="Enter your name" value="<?php echo isset($name) ? $name : '';?>" required>
        </div>

        <div class="form-field">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Ex. johndoe@gmail.com" value="<?php echo isset($email) ? $email : '';?>" required>
        </div>

        <div class="form-field">
            <label for="message">Message </label>
            <textarea name="message" id="message" maxlength="5000" required><?php echo isset($message) ? $message : '';?></textarea>
        </div>
        
        <div class="submit">
            <input type="submit" name="submit" value="Send Message">
        </div>
    </form>

</section>

<?php
    $content = ob_get_clean();
    include 'base.php';
?>