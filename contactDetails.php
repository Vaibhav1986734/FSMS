<?php
      header("Cache-Control: no-cache, must-revalidate");
      if (session_status() == PHP_SESSION_NONE) 
             session_start();

      $role="admin";
      include("shared/checkuserlogin.php");
      include("shared/conn.php");      
      if($_REQUEST["flag"]=="d")
      {
          $id=$_GET['id'];
          mysqli_query($conn,"delete from contact_messages where id=$id") or die("Error: ".mysqli_error($conn));
      header("location: contactDetails.php");
      }
?>

<!DOCTYPE html>
  <html>
   <head>
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" charset="utf-8" />
      <title>Dashboard - contact Details</title>
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
      <div class="container">
         <div class="row">
            <div class="col-12">
               <h3>Contact Details</h3>
            </div>
         </div>
         <hr/>
         <div class="row table-responsive">
            <div class="col-md-12">
               <?php
                  $rs=mysqli_query($conn,"SELECT * FROM `contact_messages`  order by id desc")              
                  or die("Error: ".mysqli_error($conn));
                  $str="";
                  $id=1;

                  while($row=mysqli_fetch_array($rs))
                     {
                        $str.="<tr>
                           <td>$id .</td>
                           <td>$row[1]</td>
                           <td>$row[2]</td>
                           <td>$row[3]</td>
                           <td>$row[4]</td>
                           <td class='text-center'>
                              <a href='contactDetails?flag=d&id=$row[0]' class='btn btn-outline-danger'
                                    onclick='return confirm(\"Do you want to Delete this Record..?\")'>
                                    <i class='fa fa-trash'> 
                                       Delete
                                    </i> 
                              </a>
                           </td>
                        </tr>";
                     $id++;
      }
      $tbl="";
      if($str)
      {
         $tbl.="<table class='table table-bordered '>
                     <tr class='bg-info text-white text-center'>
                     <th>Sno.</th>
                     <th>Name</th>
                     <th>E-mail</th>
                     <th>Message</th>
                     <th>Date & time</th>
                     <th class='text-center'> Action</th>
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

</body>
</html>