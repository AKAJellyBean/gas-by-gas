<?php
    require 'functions.php';

    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = getUserInfoForLogin($email, $password);

        if($user) {
            header('Location: ../frontend/index.html');
            exit;
        } else {
            echo "<p style=color:red;>Invalid email or password</p>";
        }
    }
        
?>
