<?php
require 'config.php';

// Function to insert user into the database
function addUser($first_name, $last_name, $email, $phone, $nic, $street_address, $city, $province, $password) {
    global $conn;
    
    // Hash password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Use double quotes for the "user" table to avoid conflicts with reserved keywords
    $query = 'INSERT INTO "user" (first_name, last_name, email, phone, nic, street_address, city, province, password) 
              VALUES (:first_name, :last_name, :email, :phone, :nic, :street_address, :city, :province, :password)';
    
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':first_name', $first_name);
    $stmt->bindParam(':last_name', $last_name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':nic', $nic);
    $stmt->bindParam(':street_address', $street_address);
    $stmt->bindParam(':city', $city);
    $stmt->bindParam(':province', $province);
    $stmt->bindParam(':password', $hashed_password);

    return $stmt->execute();
}

// function for fetch user info for user login
function getUserInfoForLogin($email, $password) {
    global $conn;
    $query = 'SELECT * FROM "user" WHERE email=:email';
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    // fetch user data
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if($user && password_verify($password, $user['password'])) {
        return $user;
    } else {
        return false;
    }

}



?>