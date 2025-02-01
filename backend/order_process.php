<?php
    session_start();
    include 'functions.php';
    include 'token.php';
    include 'send_sms.php';

    // taking input from the form
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // check if the user is logged in
        if(!isset($_SESSION['user_id'])) {
            // if user is not logged in, redirect to login page
            header("Location: ../frontend/login.php");
            exit();
        } else {

            // if user is logged in
            $user_id = $_SESSION['user_id'];
            $outlet_id = $_POST['outlet'];
            $gas_type = $_POST['gas_type'];
            $quantity = $_POST['quantity'];

            // get outlet info by id
            $outlet = getOutletInfoById($outlet_id);
            $outlet_name = $outlet['outlet_name']; // outlet name

            // get gas data from the database
            $gas = getGasNameById($gas_type);
            $gas_name = "{$gas['gas_name']}kg"; // gas name

            // generate token
            $token = generateToken($outlet_id, $user_id, $gas_name);

            // generate pickup date
            $pickup_date = date('Y-m-d', strtotime('+7 day'));

            // insert request into the database
            $created_at = date('Y-m-d');
            try {
                
                insertRequest($user_id, $outlet_id, $token, "pending", $pickup_date, $created_at, $quantity);
            } catch (Exception $e) {
                // handle the error
                $error[] = $e->getMessage();
            }

            // send notification to the user if the data is inserted successfully
            if (empty($error)) {
                // send sms to the user

                // get user mobile number
                $user = getUserInfoById($user_id);
                $phone = $user['phone'];

                // add country code to the phone number
                $phone = "+94" . substr($phone, 1);

                $message = "GasByGas: Mr/Mrs. {$_SESSION['user_name']}, Your gas request has been received. We'll notify you when it's ready for pickup.";
                sendSms($phone, $message);
            } else {
                echo "Error: {$error[0]}";
            }

            echo $token;
        }

        
    }
?>
