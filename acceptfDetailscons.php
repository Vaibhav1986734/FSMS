<?php
header("Cache-Control: no-cache, must-revalidate");
if (session_status() == PHP_SESSION_NONE) 
    session_start();
$role = "farmer";

include("shared/checkuserlogin.php");
include("shared/conn.php");     
$str = "";
$email = $_SESSION['email'] ?? ''; // Get the email from the session
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" charset="utf-8" />
    <title>Dashboard - Accept Details</title>
    <link rel="stylesheet" href="css/all.min.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/admincss.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <style>
        @media print {
            #btnPrint {
                display: none;
            }
        }
    </style>
</head>

<body class="sb-nav-fixed">
<?php include_once("shared/adminpagetop.php") ?>
<div id="layoutSidenav">
    <?php include_once("shared/adminsidenav.php") ?>
    <div id="layoutSidenav_content">
        <main> 
            <div class="container">
                <div class="row mt-2 p-3 bg-light">
                    <div class="col-6">
                        <h3>Accept Food Order Details</h3>
                    </div>
                    <div class="col-6 text-right">
                        <button id="btnPrint" onclick='print();' class='btn btn-outline-success'>
                            <i class='fa fa-print'> Print Report </i> 
                        </button>
                    </div>
                </div>
                <!-- report details -->
                <div class="row table-responsive">
                    <div class="col-md-12">
                        <?php
                        // Prepare SQL statement
                        $sql = "SELECT * FROM cfood WHERE status = 'A' AND email = ? ORDER BY item_id DESC";
                        $stmt = $conn->prepare($sql);

                        if ($stmt) {
                            $stmt->bind_param("s", $email); // Bind the email parameter
                            $stmt->execute();
                            $result = $stmt->get_result();

                            $str = "";
                            $item_id = 1;

                            while ($row = $result->fetch_array()) {
                                $str .= "<tr>
                                            <td>$item_id.</td>
                                            <td>$row[1]</td>
                                            <td>$row[2]</td>
                                            <td>$row[3]</td>     
                                          </tr>";
                                $item_id++;
                            }

                            $tbl = "";
                            if ($str) {
                                $tbl .= "<table class='table table-bordered text-center'>
                                            <tr class='bg-info text-white'>
                                                <th>Sno.</th>
                                                <th>Food Name</th>
                                                <th>Amount[kg]</th>
                                                <th>Cost[Rupees]</th>
                                            </tr>
                                            $str
                                          </table>";
                            }
                            if ($tbl) {
                                echo $tbl;
                            } else {
                                echo "No data found.";
                            }

                            $stmt->close();
                        } else {
                            die("Error preparing statement: " . $conn->error);
                        }

                        mysqli_close($conn); 
                        ?>
                    </div>
                </div>
            </div>
        </main>
        
        <?php include_once("shared/adminpagebottom.php") ?>
    </div>
</div>
<script>
    function setStatus(msg, status, item_id) {
        //alert("Req Id: "+item_id +" Status: "+status);
        if (confirm(msg)) {       
            $.ajax({
                type: "POST",
                url: "api/FoodStatus.php",
                data: JSON.stringify({"item_id": item_id, "Status": status}),
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                success: function(response) {
                    if (response.ResponseCode === 1) {
                        alert(response.ResponseText);
                        location.reload();
                    }
                },
                error: function(error) {
                    alert(JSON.stringify(error));
                }
            });
        }
    }
</script>
</body>
</html>
