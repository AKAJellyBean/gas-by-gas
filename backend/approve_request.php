<?php
    include 'functions.php';
    include 'send_sms.php';

    // taking input from the form
    $request_id = $_GET['request_id'];
    $user_id = $_GET['user_id'];
    $token = $_GET['token'];
    $pickup_date = $_GET['pickup_date'];

    // set status to approved
    $status = "approved";

    // update request status in the database
    $result = updateRequestStatus($request_id, $status);

    if ($result) {
        // get user data by user id
        $user = getUserInfoById($user_id);
        $phone = $user['phone'];
        $first_name = $user['first_name'];
        $last_name = $user['last_name'];

        
        

        // send sms to the user
        $message = "GasByGas: Dear {$first_name} {$last_name}, your gas request has been approved. Your Token ID is {$token}. Please pick up your gas from the outlet before {$pickup_date}. Thank you for choosing GasByGas.";

        sendSms($phone, $message);

        echo "success";
    } else {
        echo "failed";
    }
?>