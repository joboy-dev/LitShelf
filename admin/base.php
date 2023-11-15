<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LitShelfAdmin- <?php echo $pageTitle ?></title>
    <link rel="shortcut icon" href="/frontend/assets/favicon.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,300;0,400;0,500;0,600;0,700;0,900;1,100;1,400;1,500;1,600;1,700;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/admin/frontend/styles/base.css">
    <?php echo $styles ?>
</head>
<body>
    <!-- NAVBAR -->
    <nav>
        <div class="container">
            <a class="logo" href="/admin"><img src="/frontend/assets/images/logo.png" alt="logo"></a>

            <!-- Nav Items -->
            <div class="nav-items">
                <?php if(isset($_SESSION['admin_id'])): ?>
                    <a class="nav-link <?php echo $pageTitle == 'Users' ? 'active' : '' ?>" href="/admin/users">Users</a>
                    <a class="nav-link <?php echo $pageTitle == 'Books' ? 'active' : '' ?>" href="/admin/books">Books</a>
                    <a class="nav-link <?php echo $pageTitle == 'Authors' ? 'active' : '' ?>" href="/admin/authors">Authors</a>
                    <a class="nav-link <?php echo $pageTitle == 'Genres' ? 'active' : '' ?>" href="/admin/genres">Genres</a>
                    <a class="nav-link <?php echo $pageTitle == 'Borrowed Books' ? 'active' : '' ?>" href="/admin/borrowed-books">Borrowed Books</a>
                    <a class="nav-link <?php echo $pageTitle == 'Book Requests' ? 'active' : '' ?>" href="/admin/book-requests">Book Requests</a>
                    <a class="nav-link <?php echo $pageTitle == 'Logout' ? 'active' : '' ?>" href="/admin/logout">Logout</a>
                <?php else: ?>
                    <a class="nav-link <?php echo $pageTitle == 'Login' ? 'active' : '' ?>" href="/admin/login">Login</a>
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