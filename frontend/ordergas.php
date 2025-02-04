<?php
    session_start();
    include '../backend/functions.php';
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Gas</title>
    <link rel="stylesheet" href="./css/ordergas.css">
</head>
<body>
    <div class="wrapper">
        <header>
            <nav class="nav">
                <div class="order-logo">
                    <span>Gas by Gas - Order Gas</span>
                </div>

                <div class="home">

                    <a href="../index.php">Back to Home</a>


                    <a href="index.php">Back to Home</a>

                    <a href="index.html">Back to Home</a>


                </div>
            </nav>
        </header>
        <section class="order-portal">
            <form action="../backend/order_process.php" method="post" class="order-form">
                <!-- handle the guest user requests -->

            

                <?php
                    if(!isset($_SESSION['user_name'])) {
                        echo '<input type="text" name="first_name" placeholder="First Name">';
                        echo '<input type="text" name="last_name" placeholder="Last Name">';
                        echo '<input type="phone" name="phone" placeholder="Phone">';
                        echo '<input type="nic" name="nic" placeholder="NIC">';
                    }
                ?>

                <select name="outlet" class="outlet">
                    <option value="select" disabled selected>Select Outlet</option>
                    <?php
                        $outlets = getOutletInfo();
                        foreach ($outlets as $outlet) {
                            echo "<option value={$outlet['outlet_id']}>{$outlet['outlet_name']}</option>";
                        }
                    ?>
                </select>
                
                <select name="gas_type" class="gas_type">
                    <option value="select" disabled selected>Select Gas</option>
                    <?php
                        $gases = getGasName();
                        foreach($gases as $gas) {
                            echo "<option value={$gas['gas_id']}>{$gas['gas_name']}kg</option>";
                        }
                    ?>



                    
                

                </select>

                <input type="text" name="quantity" placeholder="Quantity">

                <button type="submit">Generate Token</button>

            </form>
        </section>
    </div>
</body>
</html>