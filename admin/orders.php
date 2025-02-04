<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Gas Requests</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Gas By Gas</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="requests.php">Requests</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <h2 class="mb-4">Gas Requests</h2>
        <table class="table table-bordered text-center">
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

                    // registered user gas data
                    $requests = getApprovedUserGasData(); // Assuming this function gets only active requests

                    if (empty($requests)) {
                        echo '<tr><td colspan="7">No active requests found.</td></tr>';
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
                                    <a href='../backend/complete_request.php?request_id={$request['request_id']}&user_id={$user_id}&token={$request['token']}&pickup_date={$request['pickup_date']}' class='btn btn-success btn-sm'>Complete</a>
                                    <a href='reallocate_request.php?request_id={$request['request_id']}' class='btn btn-warning btn-sm'>Re-allocate</a>
                                </td>";
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
