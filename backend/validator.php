<?php
function validateName($name) {
    return preg_match("/^[a-zA-Z ]+$/", $name) === 1;
}

function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

function validatePhone($phone) {
    return preg_match("/^07[0-9]{8}$/", $phone) === 1;
}

function validateNIC($nic) {
    return preg_match("/^[0-9]{9}[vV]$|^[0-9]{12}$/", $nic) === 1;
}

function validateStreetAddress($street_address) {
    return !empty($street_address);
}

function validateCity($city) {
    return preg_match("/^[a-zA-Z ]+$/", $city) === 1;
}

function validateProvince($province) {
    $valid_provinces = ['Province1', 'Province2', 'Province3']; // Replace with actual province names
    return in_array($province, $valid_provinces);
}

function validatePassword($password) {
    return strlen($password) >= 8 && preg_match("/[0-9]/", $password) === 1;
}
?>