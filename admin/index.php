<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="css/index.css">
    <style>
        
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <a href="#">Dashboard</a>
        <a href="#">Users</a>
        <a href="requests.php">Pending Requests</a>
        <a href="orders.php">Orders</a>
        <a href="#">Settings</a>
        <a href="#">Reports</a>
        <a href="#">Logout</a>
    </div>
    <div class="content">
        <h1>Welcome to the Admin Panel</h1>
        <p>This is the main content area.</p>
        <div class="cards">
            <div class="card">
                <h3>Total Orders</h3>
                <p>150</p>
            </div>
            <div class="card">
                <h3>Completed Orders</h3>
                <p>120</p>
            </div>
            <div class="card">
                <h3>Pending Orders</h3>
                <p>20</p>
            </div>
            <div class="card">
                <h3>Canceled Orders</h3>
                <p>10</p>
            </div>
            <div class="card">
                <h3>Stock Status</h3>
                <p>In Stock</p>
            </div>
            <div class="card">
                <h3>12.5kg Gas Status</h3>
                <p>Available</p>
            </div>
            <div class="card">
                <h3>5kg Gas Status</h3>
                <p>Low Stock</p>
            </div>
        </div>
        <div class="cards">
            <div class="card">
                <h3>Total Registered Users</h3>
                <p>500</p>
                <button>View All Users</button>
            </div>
            <div class="card">
                <h3>Total Outlets</h3>
                <p>50</p>
                <button>View All Outlets</button>
            </div>
        </div>
    </div>
</body>
</html>
