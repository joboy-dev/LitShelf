<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LitShelf- <?php echo $pageTitle ?></title>
    <link rel="shortcut icon" href="/frontend/assets/favicon.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,300;0,400;0,500;0,600;0,700;0,900;1,100;1,400;1,500;1,600;1,700;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/frontend/styles/base.css">
    <?php echo $styles ?>
</head>
<body>
    <!-- NAVBAR -->
    <nav>
        <div class="container">
            <a class="logo" href="/"><img src="/frontend/assets/images/logo.png" alt="logo"></a>

            <!-- Burger icon -->
            <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> -->

            <!-- Nav Items -->
            <div class="nav-items">
                <a class="nav-link <?php echo $pageTitle == 'Home' ? 'active' : '' ?>" href="/">Home</a>

                <?php if(isset($_SESSION['user_id'])): ?>
                    <a class="nav-link <?php echo $pageTitle == 'Library' ? 'active' : '' ?>" href="/library">Library</a>
                    <a class="nav-link <?php echo $pageTitle == 'Borrowed Books' ? 'active' : '' ?>" href="/borrowed-books">Borrowed Books</a>
                    <a class="nav-link <?php echo $pageTitle == 'Profile' ? 'active' : '' ?>" href="/profile">Profile</a>
                    <a class="nav-link <?php echo $pageTitle == 'Logout' ? 'active' : '' ?>" href="/logout">Logout</a>
                <?php else: ?>
                    <a class="nav-link <?php echo $pageTitle == 'Login' ? 'active' : '' ?>" href="/login">Login</a>
                    <a class="nav-link <?php echo $pageTitle == 'Sign Up' ? 'active' : '' ?>" href="/signup">Sign Up</a>
                <?php endif ?>
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
    
    <!-- Script to close message displays after 5 seconds -->
    <script>
        var message = document.querySelector(".message");

        function close() {
            message.style.display = "none";
        }

        setTimeout(close, 5000);
    </script>
</body>
</html>