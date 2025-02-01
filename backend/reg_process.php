<?php
session_start();
require_once 'functions.php';
require_once 'validator.php';

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // trim and sanitize input
    $first_name = trim(htmlspecialchars($_POST['first_name']));
    $last_name = trim(htmlspecialchars($_POST['last_name']));
    $email = trim(htmlspecialchars($_POST['email']));
    $phone = trim(htmlspecialchars($_POST['phone']));
    $nic = trim(htmlspecialchars($_POST['nic']));
    $street_address = trim(htmlspecialchars($_POST['street_address']));
    $city = trim(htmlspecialchars($_POST['city']));
    $province = trim(htmlspecialchars($_POST['province']));
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // name validations
    if (!validateName($first_name)) {
        $errors[] = "First name is required and must contain only letters.";
    }

    if (!validateName($last_name)) {
        $errors[] = "Last name is required and must contain only letters.";
    }

    // email validation
    if (!validateEmail($email)) {
        $errors[] = "Invalid Email format";
    }

    // phone number validation
    if (!validatePhone($phone)) {
        $errors[] = "Phone number must be 10 digits";
    }

    // nic number validation (10 characters or 12 characters)
    if (!validateNIC($nic)) {
        $errors[] = "Invalid NIC format";
    }

    // address validation
    if (empty($street_address)) {
        $errors[] = "Street Address is required";
    }

    if (empty($city)) {
        $errors[] = "City is required";
    }

    if (empty($province)) {
        $errors[] = "Province is required";
    }

    // password validation
    if (!validatePassword($password)) {
        $errors[] = "Password must be at least 8 characters long and include at least one letter and one number.";
    }

    // validate confirm password
    if ($password !== $confirm_password) {
        $errors[] = "Passwords do not match.";
    }

    // Check if NIC or email already exists in the database
    // get user id
    
    if (userExists($nic)) {
        $errors[] = "User with this NIC already exists.";
    }


    // If there are errors, store them in the session and redirect back to the registration page
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header('Location: ../frontend/registration.php');
        exit();
    }

    // Proceed with registration if no errors
    if (addUser($first_name, $last_name, $email, $phone, $nic, $street_address, $city, $province, $password)) {
        echo "Registration Successful!";
        header("Location: ../frontend/login.html");
        exit();
    } else {
        // if registration failed
        echo "Error: Registration Failed!";
    }
}
?>