<?php
session_start();

$error = [];

require 'functions.php';

if (isset($_SESSION['success'])) {
    echo "<p style='color:green; text-align: center; padding: 10px;'>" . $_SESSION['success'] . "</p>";
    unset($_SESSION['success']);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = getUserInfoForLogin($email, $password);

    if ($user) {
        $_SESSION['user_id'] = $user['user_id'];
        header('Location: ../index.php');
        exit();
    } else {
        $error[] = "Invalid email or password";
        $_SESSION['errors'] = $error;
    }
}
?>
