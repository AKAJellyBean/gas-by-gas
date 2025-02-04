<?php

    session_start();

    require_once 'functions.php';
    require_once 'send_sms.php';
    $errors = [];

    $request_id = $_GET['request_id'];
    
    // get user id by request id
    $request = getRequestById($request_id);
    $user_id = $request['user_id'];


    $status = "declined";

    $result = updateRequestStatus($request_id, $status);

    if ($result) {
        $user = getUserInfoById($user_id);
        $phone = $user['phone'];
        $phone = getPhoneNumber($phone);
        $first_name = $user['first_name'];
        $last_name = $user['last_name'];
        $message = "GasByGas: Dear {$first_name} {$last_name}, your gas request has been declined. Thank you for choosing GasByGas.";
        sendSms($phone, $message);
        echo "Request Declined Successfully";
    } else {
        $errors [] = "Request Decline Failed";
    }

?>