<?php
header("Cache-Control: no-cache, must-revalidate");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$role = "consumer";
include("shared/checkuserlogin.php");
include("shared/conn.php");      

$flag = "";
$item_id = "";
$foodname = "";
$quantity = "";
$price = ""; 
$status = 'N';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $rs = mysqli_query($conn, "SELECT MAX(item_id) FROM cfood") or die("Error: " . mysqli_error($conn));
    $mitem_id = mysqli_fetch_row($rs)[0] ?: 0;
    $item_id = $mitem_id + 1;

    $foodname = $_POST["ddlfoodname"];
    $quantity = (int)$_POST["txtquantity"]; 
    $flag = $_POST["hfflag"];

    $id = mysqli_real_escape_string($conn, $foodname);
    $food_query = mysqli_query($conn, "SELECT rate FROM foodrates WHERE item_name = '$id'") or die("Error: " . mysqli_error($conn));
    if ($food_row = mysqli_fetch_assoc($food_query)) {
        $p = $food_row['rate'];
        $price = $p * $quantity; 
    }

    $email = $_SESSION['email'] ?? '';

    // Prepare SQL statement
    $sql = "INSERT INTO cfood (item_id, foodname, quantity, price, status, email) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("isssss", $item_id, $foodname, $quantity, $price, $status, $email);
        
        if ($stmt->execute()) {
            echo "<script>alert('Request successfully posted. Your response Id is: $item_id'); location='requestfDetails'</script>";
        } else {
            die("Error: Unable to execute the statement.");
        }
        $stmt->close();
    } else {
        die("Error preparing statement: " . $conn->error);
    }

    mysqli_close($conn);
}
?>

<!-- Rest of your HTML form code here -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/all.min.css" />
      <link rel="stylesheet" href="css/bootstrap.min.css" />
      <link rel="stylesheet" href="css/admincss.css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   

   </head>
   <body class="sb-nav-fixed" >
   <?php include_once("shared/adminpagetop.php") ?>
   <div id="layoutSidenav">
     <?php include_once("shared/adminsidenav.php") ?>

     <div id="layoutSidenav_content">
      <main> 
<header>
    <div class="container">
        <div class="row">

            <div class="col-md-6 mx-auto">
                <div class="card mt-5">
                    <div class="card-title bg-primary p-2 text-center" style="background:linear-gradient(#00bbf0,#45eba5);">
                        <h3 class="text-white">Request Food</h3>
                    </div>


                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Food Name</label>
                                <select id="ddlfoodname" name="ddlfoodname" class="form-control">
                                    <option value="0" selected="selected">Select Food</option>
                                    <?php
                                    $rs = mysqli_query($conn, "SELECT * FROM foodrates") or die("Error " . mysqli_error($conn));
                                    while ($row = mysqli_fetch_array($rs)) {
                                        $selected = ($foodname == $row[0]) ? "selected='selected'" : "";
                                        echo "<option value='$row[1]' $selected>$row[1]</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Quantity</label>
                                <input type="number" id="txtquantity" name="txtquantity" required placeholder="Enter quantity of food."
                                       class="form-control" />
                            </div>


                            <div class="text-right"> 
                                <input type="hidden" id="hfflag" name="hfflag" value="<?php echo htmlspecialchars($flag); ?>" />
                                <button class="btn btn-outline-primary" type="submit">
                                    <i style='font-size:20px' class='fa fa-save'></i> Submit
                                </button>

                                <button class="btn btn-outline-danger" type="button" onclick="window.location.replace('requestfDetails')">
                                    <i style='font-size:20px' class='fa fa-times'></i> Cancel
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

</main>

<?php
mysqli_close($conn); 
include_once("shared/adminpagebottom.php") 
?>
</body>
</html>
