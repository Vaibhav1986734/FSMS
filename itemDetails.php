<?php
     header("Cache-Control: no-cache, must-revalidate");

     if (session_status() == PHP_SESSION_NONE) 
             session_start();

          $role="admin";

      include("shared/checkuserlogin.php");
      include("shared/conn.php");

  ?>

<!DOCTYPE html>
  <html>

  <head>
      <meta name="viewport" content="width=device-width, initial-scale=1, 
       shrink-to-fit=no" charset="utf-8" />
       <title>Dashboard - Item Details</title>
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


     <div class="container mt-3">

      <div class="row">

        <div class="col-md-9" style="font-size: 25px;
         font-weight: bold;">Food Item Details</div>

          <div class="col-md-3 text-right">
           <a href="ManageItem?flag=a" class="btn btn-success text-white">
              <i class='fa fa-plus-square' style=' padding: 4px'> Add New item</i></a>
          </div>

         </div>

       <hr/>

     <div class="row table-responsive text-center">
       <div class="col md-12">

  <?php

       $rs=mysqli_query($conn,"select * from foodrates order by item_id desc")
       or die("Error: ".mysqli_error($conn));
 
      $str="";
 
      $item_id=1;

       while($row=mysqli_fetch_array($rs))
          {
                $str=$str."<tr>
                               <td>$item_id</td>
                               <td>$row[1]</td>
                               <td>$row[2]</td>
                              <td>$row[3]</td>
                              <td>$row[4]</td>
                              <td>$row[5]</td>
                              <td>$row[6]</td>
                                <td class='text-center'>

        			   <a href='ManageItem?flag=e&item_id=$row[0]'
        			    class='btn btn-outline-success'>	<i class='fa fa-edit'> Edit</i></a>
      				</td>

                               <td class='text-center'>

                                <a href='ManageItem?flag=d&item_id=$row[0]'
                                    class='btn btn-outline-danger' 
                                    onclick='return confirm(\"Do you want to Delete this  Record..?\")'><i class='fa fa-trash'> 
                                             Delete</i>
                                 </a>
                              </td>
                         </tr>";

                        $item_id++;
             }

 
     $tbl="";

      if($str)
       {
          $tbl=$tbl."<table class='table table-bordered '>
             <tr class='bg-info text-white'>
               <th>Sno.</th>
               <th>food-Name</th>
               <th>Stock[Kg]</th>
               <th>Rate[₹]</th>
                <th>Water-used[Li]</th>
                 <th>Energy used[kJ]</th>
                  <th>Distance[Km]</th>

               <th colspan='2' class='w-25 text-center'>&nbsp; Action </th>
            </tr>
                     $str
           </table>";
        }

       if($tbl)
               echo $tbl;
        else
             echo "No Date Found...!!";
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