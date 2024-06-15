<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Extreme Explorer - Login</title>
    <link rel="stylesheet" href="/Extreme_Explorer/pages/login/login.css">
</head>
<body>
    <?php include (__DIR__ . '/../../components/header/header.php'); ?>

    <div class="login-container">
        <form action="/Extreme_Explorer/services/login.php" method="post">
            <h1>Login</h1>
            <?php
            if (isset($_GET['error'])) {
                echo '<p class="error-message">' . htmlspecialchars($_GET['error']) . '</p>';
            }
            ?>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <button type="submit" class="submit-btn">Login</button>
            </div>
        </form>
    </div>

    <?php include (__DIR__ . '/../../components/footer/footer.html'); ?>
</body>
</html>
