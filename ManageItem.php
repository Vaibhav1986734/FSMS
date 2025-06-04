<?php

header("Cache-Control: no-cache, must-revalidate");

if (session_status() == PHP_SESSION_NONE) 
    session_start();

include("shared/checkuserlogin.php");
include("shared/conn.php");

$item_id = "";
$item_name = "";
$amount = "";
$water_used = "";
$energy_used = "";
$distance = "";
$rate = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {  
    $flag = $_POST["hfFlag"];
    $item_id = $_POST["hfitem_id"];
    $item_name = $_POST["txtitem_name"];
    $amount = $_POST["txtstock"];
    $water_used = $_POST["txtwater_used"];
    $energy_used = $_POST["txtenergy_used"];
    $distance = $_POST["txtdistance"];

    // Calculate the rate using the formula
    $rate = ($water_used * 0.1) + ($energy_used * 0.05) + ($distance * 0.2);

    // Debugging output
    echo "Item ID: $item_id, Item Name: $item_name, Amount: $amount, Water Used: $water_used, Energy Used: $energy_used, Distance: $distance, Rate: $rate<br>";

    if ($flag == "a") {
        $rs = mysqli_query($conn, "SELECT MAX(item_id) FROM foodrates") or die("Error: " . mysqli_error($conn));
        $mitem_id = "";

        if ($row = mysqli_fetch_row($rs)) {
            $mitem_id = $row[0];
        }

        if (!$mitem_id) {
            $item_id = 10;
        } else {
            $item_id = $mitem_id + 1;
        }

        // Insert query including the calculated rate
        $sql = "INSERT INTO foodrates (item_id, item_name, amount, water_used, energy_used, distance, rate) 
                VALUES ($item_id, '$item_name', $amount, $water_used, $energy_used, $distance, $rate)";

        // Debug the SQL query
        echo $sql; // Print the SQL query to check it

    } else {
        // Update query including the calculated rate
        $sql = "UPDATE foodrates 
                SET item_name='$item_name', amount='$amount', water_used='$water_used', energy_used='$energy_used', distance='$distance', rate=$rate 
                WHERE item_id=$item_id";
    }

    // Execute the query and check for errors
    if (!mysqli_query($conn, $sql)) {
        echo "Error: " . mysqli_error($conn); // Print error message
    } else {
        header("Location: itemDetails");
        exit(); // Make sure to exit after a header redirect
    }
} else { 
    $flag = $_GET["flag"];
    if ($flag == "d") {
        if (isset($_GET["item_id"])) 
            $item_id = $_GET["item_id"];

        mysqli_query($conn, "DELETE FROM foodrates WHERE item_id=$item_id") or die("Error: " . mysqli_error($conn));
        header("Location: itemDetails");
        exit();
    } else {
        if ($flag == "e") {
            if (isset($_GET["item_id"]))
                $item_id = $_GET["item_id"];

            $rs = mysqli_query($conn, "SELECT * FROM foodrates WHERE item_id=$item_id") or die("Error: " . mysqli_error($conn));

            if ($row = mysqli_fetch_row($rs)) {
                $item_name = $row[1];
                $amount = $row[2];
                $water_used = $row[3];
                $energy_used = $row[4];
                $distance = $row[5];
                $rate = $row[6];  // Load the rate from the database if available
            }
        } else {
            $item_name = "";
            $amount = "";
            $water_used = "";
            $energy_used = "";
            $distance = "";
            $rate = "";
        }
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" charset="utf-8"/>
    <title>Dashboard - Manage foodrates</title>
    <link rel="stylesheet" href="css/all.min.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/admincss.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script>
        // Function to calculate the rate dynamically
        function calculateRate() {
            // Get the values from the input fields
            var waterUsed = document.getElementById("txtwater_used").value;
            var energyUsed = document.getElementById("txtenergy_used").value;
            var distance = document.getElementById("txtdistance").value;

            // Ensure the values are numeric and not empty
            waterUsed = waterUsed ? parseFloat(waterUsed) : 0;
            energyUsed = energyUsed ? parseFloat(energyUsed) : 0;
            distance = distance ? parseFloat(distance) : 0;

            // Calculate the rate using the formula
            var rate = (waterUsed * 0.1) + (energyUsed * 0.05) + (distance * 0.2);

            // Update the rate field with the calculated value
            document.getElementById("txtrate").value = rate.toFixed(2);
        }
    </script>
</head>

<body class="sb-nav-fixed">
    <?php include_once("shared/adminpagetop.php") ?>

    <div id="layoutSidenav">
        <?php include_once("shared/adminsidenav.php") ?>

        <div id="layoutSidenav_content">
            <main>  
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 mx-auto">
                            <div class="card mt-5">
                                <div class="card-title bg-info p-2 text-center">
                                    <h3 class="text-white">Manage Food Item</h3>
                                </div>
                                <div class="card-body">
                                    <form method="post">
                                        <div class="form-group">
                                            <label>Food Name</label>
                                            <input type="text" id="txtitem_name" name="txtitem_name" required="required" placeholder="Please Enter food name" value="<?php echo $item_name ?>" class="form-control" />
                                        </div>
                                        <div class="form-group">
                                            <label>Amount of Stock</label>
                                            <input type="number" id="txtstock" name="txtstock" required="required" placeholder="Please enter food stock in kg" value="<?php echo $amount ?>" class="form-control" />
                                        </div>
                                        <div class="form-group">
                                            <label>Water Used (Liters)</label>
                                            <input type="number" id="txtwater_used" name="txtwater_used" required="required" placeholder="Please enter water used" value="<?php echo $water_used ?>" class="form-control" oninput="calculateRate()" />
                                        </div>
                                        <div class="form-group">
                                            <label>Energy Used (kJ)</label>
                                            <input type="number" id="txtenergy_used" name="txtenergy_used" required="required" placeholder="Please enter energy used" value="<?php echo $energy_used ?>" class="form-control" oninput="calculateRate()" />
                                        </div>
                                        <div class="form-group">
                                            <label>Distance (km)</label>
                                            <input type="number" id="txtdistance" name="txtdistance" required="required" placeholder="Please enter distance" value="<?php echo $distance ?>" class="form-control" oninput="calculateRate()" />
                                        </div>
                                        <div class="form-group">
                                            <label>Rate (Calculated)</label>
                                            <input type="text" id="txtrate" name="txtrate" readonly value="<?php echo $rate ?>" class="form-control" />
                                        </div>
                                        <hr/>
                                        <div class="text-right">
                                            <input type="hidden" id="hfFlag" name="hfFlag" value="<?php echo $flag ?>" />
                                            <input type="hidden" id="hfitem_id" name="hfitem_id" value="<?php echo $item_id ?>" />
                                            <button class="btn btn-outline-info"><i style='font-size:20px' class='fa fa-save'></i> Submit</button>
                                            <button class="btn btn-outline-danger" type="button" onclick="window.location.replace('itemDetails')">
                                                <i style='font-size:20px' class='fa fa-times'></i> Cancel
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <?php
                mysqli_close($conn); 
                include_once("shared/adminpagebottom.php") 
            ?>
        </div>
    </div> 
</body>
</html>
