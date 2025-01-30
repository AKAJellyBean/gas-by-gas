<?php
    /* handles server side validation 
    
    mainly focused on User registration validation */

    require 'functions.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $errors = [];

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
        if(empty($first_name) || !preg_match("/^[a-zA-Z]+$/", $first_name)) {
            $errors[] = "First name is required and must contain only letters.";
        }

        if(empty($last_name) || !preg_match("/^[a-zA-Z]+$/", $last_name)) {
            $errors[] = "Last name is required and must contain only letters.";
        }

        // email validation
        if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid Email format";
        }

        // phone number validation
        if(empty($phone) || !preg_match("/^\d{10}$/", $phone)) {
            $errors[] = "Phone number must be 10 digits";
        }

        // nic number validation (10 characters or 12 characters)
        if(empty($nic) || !preg_match("/^(\d{9}[Vv]|\d{12})$/", $nic)) {
            $errors[] = "Invalid NIC format";
        }

        // address validation
        if(empty($street_address)) {
            $errors[] = "Street Address is required";
        }

        if(empty($city)) {
            $errors[] = "City is required";
        }

        if(empty($province)) {
            $errors[] = "Province is required";
        }

        // password validation (min: 8 characters, must contain 1 number or 1 letter)
        if(empty($password) || !preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/", $password)) {
            $errors[] = "Password must be at least 8 characters long and include at least one letter and one number.";
        }

        // validate confirm password
        if ($password !== $confirm_password) {
            $errors[] = "Passwords do not match.";
        }

        // checking errors
        if(empty($errors)) {
            // insert data in to the database if validation pass!
            if(addUser($first_name, $last_name, $email, $phone, $nic, $street_address, $city, $province, $password)) {
                echo "Registration Successfull!";
                header("Location: ../frontend/login.html");
                exit();
            } else {
                // if registration failed
                echo "Error: Registration Failed!";
            }
        } 
        
    } else {
        // if validation failed. show validation error
        foreach($errors as $error) {
            echo "<p style=color:red;>$error</p>";
        }
    }
?>  