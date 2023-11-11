<?php
    $baseUrl = 'http://localhost/LitShelf';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LitShelf- <?php echo $pageTitle ?></title>
    <link rel="shortcut icon" href="frontend/assets/favicon.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,300;0,400;0,500;0,600;0,700;0,900;1,100;1,400;1,500;1,600;1,700;1,900&display=swap" rel="stylesheet">

    <!-- <link rel="stylesheet" href="frontend/assets/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="frontend/styles/base.css">
    <?php echo $styles ?>
</head>
<body>
    <!-- NAVBAR -->
    <nav>
        <div class="container">
            <a class="logo" href="<?php echo $baseUrl?>"><img src="frontend/assets/images/logo.png" alt="logo"></a>

            <!-- Burger icon -->
            <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> -->

            <!-- Nav Items -->
            <div class="nav-items">
                <a class="nav-link <?php echo $pageTitle == 'Home' ? 'active' : '' ?>" href="/">Home</a>
                <a class="nav-link <?php echo $pageTitle == 'Login' ? 'active' : '' ?>" href="LitShelf/login">Login</a>
                <a class="nav-link <?php echo $pageTitle == 'Sign Up' ? 'active' : '' ?>" href="LitShelf/signup">Sign Up</a>
            </div>
        </div>
    </nav>

    <!-- MAIN CONTENT -->
    <main>
        <?php echo $content ?>
    </main>

    <footer>
        <p class="text-align-center">&copy; <?php echo date('Y'); ?> LitShelf</p>
    </footer>

    <script src="frontend/assets/js/bootstrap.min.js"></script>
</body>
</html>