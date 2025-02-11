<?php
    require 'backend/log_process.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gas by Gas-Home</title>
    <link rel="stylesheet" href="frontend/css/index.css">
</head>
<body>
    <div class="container">
        <header class="header">
            <nav class="nav">
                <div class="logo">
                    <a href="index.php"><img src="frontend/assets/gbg-logo-removebg-preview.png" alt="Logo"></a>
                </div>
                <ul class="nav-list">
                    <li><a href="frontend/about.html">Who We Are</a></li>
                    <li><a href="frontend/whatwedo.html">What we Do</a></li>
                    <li><a href="frontend/contact.php">Contact Us</a></li>
                </ul>
                <div class="account">
                    <!-- <a href="login.php">Login</a> -->
                    <!-- php code to show user loging informations -->
                    <?php
                        
                        if(isset($_SESSION['user_name'])) {
                            echo "<a href='frontend/profile.php'>{$_SESSION['user_name']}</a>";
                        } else {
                            echo "<a href='frontend/login.php'>Login</a>";
                        }
                    ?>
                </div>
            </nav>
        </header>
        <section class="hero">
            <div class="hero-content">
                <h1 class="hero-title">Your Trusted Gas Solution</h1>
                <p class="hero-text">Discover the perfect gas solution for your needs</p>
            </div>

            <div class="status">
                <div class="status-wrapper">
                    <div class="status-item">
                        <p>25+</p>
                        <p>Outlets</p>
                    </div>

                    <div class="status-item">
                        <p>50000+</p>
                        <p>Customers</p>
                    </div>

                    <div class="status-item">
                        <p>100+</p>
                        <p>Partners</p>
                    </div>

                    <div class="status-item">
                        <p>10+</p>
                        <p>Years of Experience</p>
                    </div>
                </div>

                <div class="buttons-wrapper">
                    <div class="buttons">
                        <a href="frontend/pricelist.php">Price List</a>
                    </div>

                    <div class="buttons">
                        <a href="frontend/outlet.php">Outlet Locations</a>
                    </div>

                    <div class="buttons">
                        <a href="frontend/ordergas.php">Online Order</a>
                    </div>
                </div>
            </div>
            
        </section>
    </div>
</body>
</html>
