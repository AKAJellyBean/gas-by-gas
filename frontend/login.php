<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="wrapper">
        <form action="../backend/log_process.php" class="login-form" method="post">
            <h1>Welcome Back!</h1>
            <p>Login here</p>

            <?php
            session_start();
            if (isset($_SESSION['errors'])) {
                foreach ($_SESSION['errors'] as $error) {
                    echo "<p style='color:red; text-align: center; padding: 10px;'>$error</p>";
                }
                unset($_SESSION['errors']);
            }
            ?>

            <div class="email">
                <input type="text" name="email" placeholder="Email" required>
            </div>

            <div class="password">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <a href="#" class="f-password">Forgot Password?</a>
            <button type="submit" class="login-button" href="login.php">Login</button>

            <div class="hr">
                <div class="line"></div>
                or
                <div class="line"></div>
            </div>
            
            <div class="reg-nav">
                <p>Don't have an account?</p>

                <a href="registration.php">Register here</a>

                <a href="registration.html">Register here</a>

            </div>
            
        </form>
    </div>
</body>
</html>