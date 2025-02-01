<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approved Gas Requests</title>
    <link rel="stylesheet" href="css/orders.css">
    
    
    </style>


</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Approved Gas Requests</h2>
        <div class="form-group">
            <div class="search-bar">
                <input type="text" placeholder="Search...">
                <button type="button">Search</button>
            </div>
        </div>
        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th>Request ID</th>
                    <th>Customer Name</th>
                    <th>Gas Type</th>
                    <th>Quantity</th>
                    <th>Token</th>
                    <th>Final Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="requestsTable">
                <!-- Approved gas requests will be populated here -->
                <?php
                    include '../backend/functions.php';

                    $approvedRequests = getApprovedUserGasData();

                    if (empty($approvedRequests)) {
                        echo '<tr><td colspan="7">No requests found.</td></tr>';
                    }
                    foreach ($approvedRequests as $request) {

                        // get user data by user id
                        $user_id = $request['user_id'];
                        $user = getUserInfoById($user_id);
                        $user_name = "{$user['first_name']} {$user['last_name']}";


                        // get gas name by gas id
                        $gas_id = $request['gas_type'];
                        $gas = getGasNameById($gas_id);
                        $gas_type = $gas['gas_name'];

                        echo "<tr>";
                        echo "<td> {$request['request_id']} </td>";
                        echo "<td> {$user_name} </td>";
                        echo "<td> {$gas_type}kg </td>";
                        echo "<td> {$request['quantity']} </td>";
                        echo "<td> {$request['token']} </td>";
                        echo "<td> {$request['pickup_date']} </td>";
                        echo "<td> 
                                <a href='../backend/complete_order.php?request_id={$request['request_id']}' class='btn btn-success'>Done</a>
                                <a href='../backend/cancel_order.php?request_id={$request['request_id']}' class='btn btn-danger'>Reallocate</a>
                              </td>";
                        echo "</tr>";
                    }
                ?>

            </tbody>
        </table>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#searchInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#requestsTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
</body>
</html>