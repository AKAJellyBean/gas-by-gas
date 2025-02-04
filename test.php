<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Gas Stocks</title>
    <style>
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f9f9f9;
        }
        h2 {
            text-align: center;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add Gas Stocks</h2>
        <form action="your_action_page.php" method="post">
            <label for="gasType">Gas Type:</label>
            <select name="gasType" id="gasType">
                <option value="Lpg 5kg cilinder">Lpg 5kg cilinder</option>
                <option value="Lpg 12.5kg cilinder">Lpg 12.5kg cilinder</option>
            </select>
            <label for="quantity">Quantity (kg/litres):</label>
            <input name="quantity" type="number" id="quantity" placeholder="Enter quantity" required>
            <label for="first_name">First Name:</label>
            <input name="first_name" type="text" id="first_name" placeholder="Enter first name" required>
            <label for="last_name">Last Name:</label>
            <input name="last_name" type="text" id="last_name" placeholder="Enter last name" required>
            <label for="NIC">NIC:</label>
            <input name="NIC" type="text" id="NIC" placeholder="Enter NIC number" required>
            <label for="outlet">Outlet:</label>
            <select name="outlet" id="outlet">
                <option value=""></option>
                <option value=""></option>
            </select>
            <button type="submit" name="save">Make Order</button>
        </form>
    </div>
</body>
</html>