<?php
      header("Cache-Control: no-cache, must-revalidate");
         if (session_status() == PHP_SESSION_NONE) 
                 session_start();
         $role="admin";
        include("shared/checkuserlogin.php");
?>

<!DOCTYPE html>
<head>
   <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no" charset="utf-8" />
      <title>Dashboard - LMS Admin</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">  
    <link href="css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/admincss.css" />
</head>
<body  class="sb-nav-fixed">
    <?php include_once("shared/adminpagetop.php") ?>
    <div id="layoutSidenav">
        <?php include_once("shared/adminsidenav.php") ?>
     <div id="layoutSidenav_content">
         <main>                
            <div style="text-align:center; border-radius:3px;">
                    <h3 class="text-danger font-weight-bold" style="padding-top:20px;text-shadow: 1px 1px 1px black;">
                        Welcome to FSMS Consumer Dashboard
                    </h3>

                     <div class="text-dark" style="font-size: 18px;
                        font-weight:bold;">
                           Here are some tips to help you get started
                     </div>

                   
                    <br/><br/>
            </div>
       </main>
            <?php include_once("shared/adminpagebottom.php") ?>
   </div>
 </div>    
</body>
</html>