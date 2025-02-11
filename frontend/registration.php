<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/registration.css">
    <title>User Registration</title>
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <?php
            if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])) {
                echo '<div class="error-messages" style="margin: 30px;background-color: red;"> ';
                foreach ($_SESSION['errors'] as $error) {
                    echo '<p class="error-message" style="color: white;padding: 10px; text-align: center">' . htmlspecialchars($error) . '</p>';
                }
                echo '</div>';
                // Clear errors after displaying
                unset($_SESSION['errors']);
            }
            ?>
            <div class="registration-body">
                <div class="registration-headings">
                    <h1>Welcome to Gas by Gas</h1>
                    <div class="heading-divider">
                        <span class="sub-heading">Setup your account</span>
                        <span class="org-reg">Are you an Organization?<a href="org-reg.php">Register here</a></span>
                    </div>
                </div>
                <form action="../backend/reg_process.php" method="post">
                    <div class="column-1">
                        <div>
                            <label for="first_name">First Name:</label>
                            <input type="text" name="first_name" placeholder="John" required>
                        </div>
                        <div>
                            <label for="last_name">Last Name:</label>
                            <input type="text" name="last_name" placeholder="Doe" required>
                        </div>
                    </div>

                    <div class="column-2">
                        <div>
                            <label for="email">Email:</label>
                            <input type="email" name="email" placeholder="john.doe@example.com" required>
                        </div>
                        <div>
                            <label for="phone">Phone:</label>
                            <input type="tel" name="phone" placeholder="123-456-7890" required>
                        </div>
                    </div>

                    <div class="column-3">
                        <div>
                            <label for="nic">NIC:</label>
                            <input type="text" name="nic" placeholder="1234567890V" required>
                        </div>
                        <div>
                            <label for="street_address">Street Address:</label>
                            <input type="text" name="street_address" placeholder="123 Main Street" required>
                        </div>
                    </div>

                    <div class="column-4">
                        <div>
                            <label for="city">City:</label>
                            <input type="text" name="city" placeholder="New York" required>
                        </div>
                        <div>
                            <label for="province">Province:</label>
                            <input type="text" name="province" placeholder="Ontario" required>
                        </div>
                    </div>

                    <div class="column-5">
                        <div>
                            <label for="password">Password:</label>
                            <input type="password" name="password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;" required>
                        </div>
                        <div>
                            <label for="confirm_password">Confirm Password:</label>
                            <input type="password" name="confirm_password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;" required>
                        </div>
                    </div>

                    <div class="button-section">
                        <button type="submit">Register</button>
                        <span>Already have an account?<a href="org-reg.php">Login here</a></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>