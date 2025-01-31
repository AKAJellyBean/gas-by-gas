<?php
    session_start();
    
    require 'functions.php';

    

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = getUserInfoForLogin($email, $password);

        if($user) {
            $_SESSION['user_id'] = $user['user_id'];
            header('Location: ../frontend/index.php');
            exit();
        } else {
            echo "<p style=color:red;>Invalid email or password</p>";
        }
    }
        
?>
