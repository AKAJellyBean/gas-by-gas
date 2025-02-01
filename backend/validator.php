<?php
function validateName($first_name) {
    return preg_match("/^[a-zA-Z-' ]*$/", $first_name);
}


function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function validatePhone($phone) {
    return preg_match("/^[0-9]{10}$/", $phone);
}

function validateNIC($nic) {
    return preg_match("/^[0-9]{9}[vVxX]$/", $nic);
}

function validateStreetAddress($street_address) {
    return !empty($street_address);
}

function validateCity($city) {
    return preg_match("/^[a-zA-Z-' ]*$/", $city);
}

function validateProvince($province) {
    $valid_provinces = ['Province1', 'Province2', 'Province3']; // Replace with actual province names
    return in_array($province, $valid_provinces);
}

function validatePassword($password) {
    return strlen($password) >= 8;
}
?>