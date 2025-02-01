<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Gas Requests</title>
    <link rel="stylesheet" href="css/requests.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Gas Requests</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Customer Name</th>
                    <th>Gas Type</th>
                    <th>Quantity</th>
                    <th>Request Date</th>
                    <th>Token</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data will be populated here -->
                <?php
                    // get request data from the database
                    include '../backend/functions.php';

                    // registerd user gas data
                    $requests = getRegisteredUserGasData();

                    if (empty($requests)) {
                        echo '<tr><td colspan="7">No requests found.</td></tr>';
                    }
                    
                    

                    foreach ($requests as $request) {
                        
                        // get user data by user id
                        $user_id = $request['user_id'];
                        $user = getUserInfoById($user_id);
                        $user_name = "{$user['first_name']} {$user['last_name']}";


                        // get gas name by gas id
                        $gas_id = $request['gas_type'];
                        $gas = getGasNameById($gas_id);
                        $gas_type = $gas['gas_name'];
                        
                        echo '<tr>';
                            echo "<td>{$request['request_id']}</td>";
                            echo "<td>{$user_name}</td>";
                            echo "<td>{$gas_type}kg</td>";
                            echo "<td>{$request['quantity']}</td>";
                            echo "<td>{$request['created_at']}</td>";
                            echo "<td>{$request['token']}</td>";
                            echo 
                                "<td>
                                    <a href='../backend/approve_request.php?request_id={$request['request_id']}&user_id={$user_id}&token={$request['token']}&pickup_date={$request['pickup_date']}'>Approve</a>
                                    <a href='decline_request.php?request_id={$request['request_id']}' class='decline'>Decline</a>
                                </td>";
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
