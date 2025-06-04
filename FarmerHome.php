 <?php
      header("Cache-Control: no-cache, must-revalidate");

         if (session_status() == PHP_SESSION_NONE) 
                 session_start();
                 $role="farmer";
        include("shared/checkuserlogin.php");
        
?>
<!DOCTYPE html>
<head>
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" charset="utf-8" />
      <title>Farmer Dashboard </title>

    <link href="css/bootstrap.min.css" rel="stylesheet">  
    <link href="css/all.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
    <link href="css/admincss.css" rel="stylesheet"/>
    <link href="css/style.css" rel="stylesheet">
    <!-- <link href="./images/login1.jpg" rel="shortcut icon" type="image/png"> -->
    
    <style>
            a{
                color:black;
                font-weight: 500;
                font-family: calibri;
            }
        </style>

</head>

<body class="sb-nav-fixed">

    <?php include_once("shared/adminpagetop.php") ?>
    <div id="layoutSidenav">
        <?php include_once("shared/adminsidenav.php") ?>
     <div id="layoutSidenav_content">
         <main>                
            <div style="text-align:center; border-radius:3px;">
                    <h3 class="text-danger font-weight-bold" style="padding-top:20px; text-shadow: 1px 1px 1px black;">
                        Welcome to Farmer food  Dashboard
                    </h3>
                    <h5>  Here are some tips to help you get started</h5>
                    <hr>

 <!------------ start the code of grafh  ----------------->


<div class="container">
     <div class="row mt-4 justify-content-center">

           <div class="col-md-6">
           <h2>Tranding food demand</h2>
           <?php include("demo.php"); ?>

<canvas id="salesChart" width="400" height="200"></canvas>
<script src="script.js"></script>

           </div>

           

      </div>
</div>
               <!------------ End the code of grafh  ----------------->


       </main>
            <?php include_once("shared/adminpagebottom.php") ?>
           
   </div>
 </div>    


    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.toaster.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/adminscripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://d19m59y37dris4.cloudfront.net/admin-premium/2-0/vendor/chart.js/Chart.min.js"></script>

</body>
</html>