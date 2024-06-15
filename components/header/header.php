<?php
$_SESSION['logged_in'] = isset($_SESSION['logged_in']) ? $_SESSION['logged_in'] : false;
$_SESSION['role'] = isset($_SESSION['role']) ? $_SESSION['role'] : "";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Extreme Explorer</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/Extreme_Explorer/components/header/header.css">
</head>

<body>
    <header>
        <div class="nav-bar">
            <div class="nav-bar-top">
                <img src="/Extreme_Explorer/public/logo_Extreme_Explorer.png" alt="Extreme Explorer" class="logo">
                <form action="search.php" method="get" class="form-inline">
                    <div class="input-group">
                        <input type="text" name="query" class="form-control" placeholder="Search for products...">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">Search</button>
                        </div>
                    </div>
                </form>
                <div class="user-options">
                    <a href="/Extreme_Explorer/pages/registration/registration.php" class="login-link">
                        <img src="/Extreme_Explorer/public/user.svg" alt="">
                        Join now
                    </a>
                    <?php
                    if ($_SESSION['logged_in']) {
                        echo '<a href="/Extreme_Explorer/pages/profile/profile.php" class="login-link">
                        <img src="/Extreme_Explorer/public/user.svg" alt="">
                        Profile
                    </a>';
                    } else {
                        echo '<a href="/Extreme_Explorer/pages/login/login.php" class="login-link">
                        <img src="/Extreme_Explorer/public/user.svg" alt="">
                        Login
                    </a>';
                    }
                    if ($_SESSION['role'] ==="admin") {
                        echo '<a href="/Extreme_Explorer/pages/customers/customers.php" class="login-link">
                        <img src="/Extreme_Explorer/public/user.svg" alt="">
                        customers
                    </a>';

                    }


                    ?>
                    <a href="#" class="login-link cart">
                        <img src="/Extreme_Explorer/public/carrito.png" alt="">
                        My cart
                    </a>
                </div>
            </div>
            <nav>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item"
                                href="/Extreme_Explorer/pages/products/products.php?category=1">Camping</a>
                            <a class="dropdown-item"
                                href="/Extreme_Explorer/pages/products/products.php?category=2">Fishing</a>
                            <a class="dropdown-item"
                                href="/Extreme_Explorer/pages/products/products.php?category=3">Boating</a>
                        </div>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#">Offers </a></li>
                    <li class="nav-item"><a class="nav-link" href="#">History</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Supermarket</a></li>
                    <li class="nav-item"><a class="nav-link"
                            href="/Extreme_Explorer/pages/contact/contact.php">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="/Extreme_Explorer/pages/about/about.php">About Us</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
</body>

</html>