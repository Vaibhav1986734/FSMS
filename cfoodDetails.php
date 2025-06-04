<?php
      header("Cache-Control: no-cache, must-revalidate");
      if (session_status() == PHP_SESSION_NONE) 
             session_start();
      $role="farmer";
      include("shared/checkuserlogin.php");
      include("shared/conn.php");      
      if($_REQUEST["flag"]=="d")
      {
          $item_id=$_GET['item_id'];
          mysqli_query($conn,"DELETE FROM `cfood` WHERE  item_id=$item_id") or die("Error: ".mysqli_error($conn));  

      header("location: cfoodDetails.php");
      }
      $str="";
?>

<!DOCTYPE html>
  <html>

   <head>
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" charset="utf-8" />
      <title>Dashboard -food details Details</title>

      <link rel="stylesheet" href="css/all.min.css" />
      <link rel="stylesheet" href="css/bootstrap.min.css" />
      <link rel="stylesheet" href="css/admincss.css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
</head>

   <body class="sb-nav-fixed">
   <?php include_once("shared/adminpagetop.php") ?>
   <div id="layoutSidenav">
     <?php include_once("shared/adminsidenav.php") ?>
     <div id="layoutSidenav_content">

      <main> 
      <div class="container">
         <div class="row mt-2 p-3 bg-light" >
            <div class="col">
               <h3>Request food</h3>
            </div>
         </div>
      </div>
         
<!-- report deatils  -->

<div class="container mt-2">
         <div class="row table-responsive">
            <div class="col-md-12">
         <?php
         $email = $_SESSION['email'] ?? '';
            $rs=mysqli_query($conn,"select *from cfood where status='N' order by item_id desc") or die("Error: ".mysqli_error($conn));
            $str="";
            $item_id=1;
            while($row=mysqli_fetch_array($rs))
                {
                $str.=" <tr>
                            <td>$item_id .</td>
                            <td>$row[1]</td>
                            <td>$row[2]</td>
                            <td>$row[3]</td>
                            <td>$row[5]</td>
                            <td class='text-center'>
                              <button onclick='setStatus(\"Do you want to Accept food Request..?\",\"A\",$row[0]);' class='btn btn-outline-success'>
                                <i class='fa fa-check'> Deliverd </i> 
                              </button>
                            </td>
                            <td>
                              <button onclick='setStatus(\"Do you want to Reject food Request..?\",\"R\",$row[0]);' class='btn btn-outline-danger'>
                                <i class='fa fa-times'> Unaccept </i> 
                              </button>
                          </td>
                        </tr>";
                  
                        $item_id++;
                }
                $tbl="";
                if($str)
                {
                  $tbl.="<table class='table table-bordered text-center '>
                              <tr class='bg-info text-white text-center'>
                              <th>Sno.</th>
                              <th>Food Name</th>
                              <th>Amount</th>
                              <th>Cost</th>
                              <th>Email</th>
                              <th colspan='2' class='w-25 text-center'> Action</th>
                          </tr>
                              
                              $str
                              </table>";
                }
                if($tbl)
                  echo $tbl;
                else
                  echo "No data found.." ;
            
               ?>
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
  <script>
    function setStatus(msg,status,item_id)
    {
      //alert("Req Id: "+item_id +" Status: "+status);
      
      if(confirm(msg))
      {       
         
         $.ajax({
        type: "POST",
        url: "api/FoodStatus.php",
        data: JSON.stringify({"item_id":item_id,"Status":status}),
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        success: function (response) {
           if(response.ResponseCode===1)
           {
            alert(response.ResponseText);
            location.reload();
           }
        },
        error: function (error) {
            alert(JSON.stringify(error));
        }
    });

      }
    }
  </script>
   </body>
</html>