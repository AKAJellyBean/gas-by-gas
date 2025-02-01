<?php
    session_start();
    include 'functions.php';
    include 'token.php';

    // taking input from the form
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // check if the user is logged in
        if(!isset($_SESSION['user_id'])) {
            // if user is not logged in
            // handle the guest user requests
            // get the input from the form
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $phone = $_POST['phone'];
            $nic = $_POST['nic'];

            $user_id = "guest";
            $outlet_id = $_POST['outlet'];
            $gas_type = $_POST['gas_type'];
            $quantity = $_POST['quantity'];

            // get outlet info by id
            $outlet = getOutletInfoById($outlet_id);

            // get gas data from the database
            $gas = getGasNameById($gas_type);
            $gas_name = "{$gas['gas_name']}kg"; // gas name

            // generate token
            $token = generateToken($outlet_id,$user_id, $gas_name);

            // generate pickup date
            $pickup_date = date('Y-m-d', strtotime('+7 day'));

            // insert request into the database
            $created_at = date('Y-m-d');
            insertGuestRequest($first_name, $last_name, $phone, $nic, $outlet_id, $token, "pending", $pickup_date, $created_at);
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
            insertRequest($user_id, $outlet_id, $token, "pending", $pickup_date, $created_at);

            echo $token;
        }

        
    }
?>
