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
        

        

        // prepare and execute the query

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
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['first_name'] . ' ' . $user['last_name'];
            $_SESSION['user_email'] = $user['email'];
            return $user;
        } else {
            return false;
        }

    }

    // function for fetch outlet informations
    function getOutletInfo() {
        global $conn;
        $query = 'SELECT * FROM "outlet"';
        $stmt = $conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // get outlet info by id
    function getOutletInfoById($outlet_id) {
        global $conn;
        $query = 'SELECT * FROM "outlet" WHERE outlet_id=:outlet_id';
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':outlet_id', $outlet_id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // get gas data from the database 
    function getGasName(){
        global $conn;
        $query = 'SELECT * FROM "gas"';
        $stmt = $conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // get gas name by id from the database
    function getGasNameById($gas_id) {
        global $conn;
        $query = 'SELECT * FROM "gas" WHERE gas_id=:gas_id';
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':gas_id', $gas_id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // function for insert request into the database
    function insertRequest($user_id, $outlet_id, $token, $status, $pickup_date, $created_at, $quantity, $gas_id) {
        global $conn;
        $query = 'INSERT INTO "request" (user_id, outlet_id, token,status,pickup_date,created_at, quantity, gas_id) VALUES (:user_id, :outlet_id, :token, :status, :pickup_date, :created_at, :quantity, :gas_id)';
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':outlet_id', $outlet_id);
        $stmt->bindParam(':token', $token);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':pickup_date', $pickup_date);
        $stmt->bindParam(':created_at', $created_at);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':gas_id', $gas_id);
        return $stmt->execute();

    }

    // function for insert gues request into the database
    function insertGuestRequest($first_name, $last_name, $phone, $nic, $outlet_id, $token, $status, $pickup_date, $created_at, $quantity) {
        global $conn;
        $query = 'INSERT INTO "guest_request" (first_name, last_name, phone, nic, outlet_id, token,status,pickup_date,created_at, quantity) VALUES (:first_name, :last_name, :phone, :nic, :outlet_id, :token, :status, :pickup_date, :created_at, :quantity)';
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name', $last_name);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':nic', $nic);
        $stmt->bindParam(':outlet_id', $outlet_id);
        $stmt->bindParam(':token', $token);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':pickup_date', $pickup_date);
        $stmt->bindParam(':created_at', $created_at);
        $stmt->bindParam(':quantity', $quantity);
        return $stmt->execute();

    }

    function getUserInfoById($user_id) {
        global $conn;
        $query = 'SELECT * FROM "user" WHERE user_id=:user_id';
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // function to get all the requested gas data from the database if the status is pending
    // registed users

    function getRegisteredUserGasData() {
        global $conn;
        $query = 'SELECT * FROM "request" WHERE status = :status';
        $stmt = $conn->prepare($query);
        $status = 'pending';
        $stmt->bindParam(':status', $status);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // function to get gas request by id
    function getRequestById($request_id) {
        global $conn;
        $query = 'SELECT * FROM "request" WHERE request_id=:request_id';
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':request_id', $request_id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function getApprovedUserGasData() {
        global $conn;
        $query = 'SELECT * FROM "request" WHERE status = :status';
        $stmt = $conn->prepare($query);
        $status = 'approved';
        $stmt->bindParam(':status', $status);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function getGuestUserGasData() {
        global $conn;
        $query = 'SELECT * FROM "guest_request"';
        $stmt = $conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // function to update request status in the database
    function updateRequestStatus($request_id, $status) {
        global $conn;
        $query = 'UPDATE "request" SET status=:status WHERE request_id=:request_id';
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':request_id', $request_id);
        $stmt->bindParam(':status', $status);
        return $stmt->execute();
    }

    function userExists($nic) {
        global $conn;
        $query = 'SELECT COUNT(*) FROM "user" WHERE nic = :nic';
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':nic', $nic);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        return $count > 0;
    }

    // get phone number with country code
    function getPhoneNumber($phone) {
        return "+94" . substr($phone, 1);
    }

    // get stock data usign outlet id
    function getStockData($outlet_id) {
        global $conn;
        $query = 'SELECT * FROM "stock" WHERE outlet_id=:outlet_id';
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':outlet_id', $outlet_id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


?>