<?php
     header("Cache-Control: no-cache, must-revalidate");

     if (session_status() == PHP_SESSION_NONE) 
             session_start();

     $lrole="Administrator";

     include("shared/checkuserlogin.php");
     include("shared/conn.php");

     // Emission factors
     $emission_factor_energy = 0.5; // kg CO2 per kWh
     $emission_factor_transport = 0.15; // kg CO2 per km
     $emission_factor_waste = 0.1; // kg CO2 per kg of waste
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" charset="utf-8" />
    <title>Dashboard: Food Details</title>
    <link rel="stylesheet" href="css/admincss.css" />
    <link rel="stylesheet" href="css/all.min.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="sb-nav-fixed">

    <?php include_once("shared/adminpagetop.php") ?>

    <div id="layoutSidenav">
        <?php include_once("shared/adminsidenav.php") ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container mt-3">
                    <div class="row">
                        <div class="col-md-9" style="font-size: 25px; font-weight: bold;">Food Item Details</div>
                      
                    </div>
                    <hr/>

                    <div class="row table-responsive">
                        <div class="col-md-12">
                            <?php

                            $rs = mysqli_query($conn, "SELECT * FROM food_items ORDER BY item_id DESC")
                            or die("Error: " . mysqli_error($conn));
                            while ($row = mysqli_fetch_array($rs)) {
                              $distance_km = $row['distance_traveled']; 
                          }
                          
                            $rs = mysqli_query($conn, "SELECT * FROM food_items ORDER BY item_id DESC")
                                or die("Error: " . mysqli_error($conn));

                            $str = "";
                            $item_id = 1;

                            while ($row = mysqli_fetch_array($rs)) {
                                // Extract energy, distance, and waste values from the database
                                $energy_kwh = $row['energy_consumed']; // Energy consumed in kWh
                                // $distance_km = $row['distance_km']; // Distance traveled in km
                                $waste_kg = $row['waste_generated']; // Waste generated in kg

                                // Calculate carbon emissions
                                $emissions_energy = $energy_kwh * $emission_factor_energy;
                                $emissions_transport = $distance_km * $emission_factor_transport;
                                $emissions_waste = $waste_kg * $emission_factor_waste;
                                $total_emissions = $emissions_energy + $emissions_transport + $emissions_waste;

                                // Build table rows
                                $str .= "<tr>
                                            <td>$item_id</td>
                                            <td>$row[1]</td>
                                            <td>$distance_km km</td>
                                            <td>$energy_kwh kWh</td>
                                            <td>$row[4]</td> <!-- Packaging type -->
                                            <td>$waste_kg kg</td>
                                            <td>" . number_format($total_emissions, 2) . " kg CO2</td>

                                           
                                        </tr>";
                                $item_id++;
                            }

                            $tbl = "";

                            if ($str) {
                                $tbl = "<table class='table table-bordered'>
                                            <tr class='bg-info text-white'>
                                                <th>Id</th>
                                                <th>Source</th>
                                                <th>Distance Traveled</th>
                                                <th>Energy Consumed</th>
                                                <th>transportation</th>
                                                <th>Waste Generated</th>
                                                <th>Carbon Emission</th>
                                                </tr>
                                            $str
                                        </table>";
                            }

                            if ($tbl)
                                echo $tbl;
                            else
                                echo "No Data Found...!!";
                            ?>
                        </div>
                    </div>
                </div>
            </main>

            <?php
            mysqli_close($conn);
            include_once("shared/adminpagebottom.php");
            ?>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
</body>
</html>
