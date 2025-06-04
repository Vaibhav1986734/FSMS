<?php

header("Cache-Control: no-cache, must-revalidate");

if (session_status() == PHP_SESSION_NONE) 
         session_start();

include("shared/checkuserlogin.php");

include("shared/conn.php");

        $item_id="";
        $statename="";

        if($_SERVER['REQUEST_METHOD']=="POST")
              {  
                     $flag=$_POST["hfFlag"];
                     $item_id=$_POST["hfstateid"];
                     $statename=$_POST["txtstatename"];
           
   
                    if($flag=="a")
                       {
                         $rs=mysqli_query($con,"select max(stateid) from states")
                         or die("Error: ".mysqli_error($con));
	
	                 $msitid="";
	
                         if($row=mysqli_fetch_row($rs))
	                       $mstateid=$row[0];

	                  if(!$mstateid)
	                       $item_id=10;
	                  else
	                       $item_id=$mstateid+1;

	  	 $sql="insert into states values($item_id,'$statename')";
	 
                       }
                    else
                      {
                       $sql="update states set statename='$statename' where stateid=$item_id";
                      } 

             mysqli_query($con,$sql) or die("Error: ".mysqli_error($con));  
             header("Location: foodresultDetails");

           }
        else
          { 
               $flag=$_GET["flag"];
               if($flag=="d")
                  {
	              if(isset($_GET["stateid"])) 
                             $item_id=$_GET["stateid"];
    
                      mysqli_query($con,"delete from states where stateid=$item_id") or
                     die("Error: ".mysqli_error($con));
                     header("Location: foodresultDetails");
                  }
                 else
                  {
                     if($flag=="e")
                         {
                            if(isset($_GET["stateid"]))
                                   $item_id=$_GET["stateid"];
     
                  $rs=mysqli_query($con,"select * from states where stateid=$item_id")
                  or die("Error: ".mysqli_error($con));
    
                 if($row=mysqli_fetch_row($rs))
                           {
                                  $statename=$row[1];
                           }
                        }
                     else
                       {
                         $statename="";
                        }
      }
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, 
     shrink-to-fit=no" charset="utf-8"/>

    <title>Dashboard - Manage States</title>
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
                    <div class="row">
                        <div class="col-md-6 mx-auto">


     <div class="card mt-5">
           <div class="card-title bg-info p-2 text-center">
                   <h3 class="text-white">Manage food items</h3>
           </div>

          <div class="card-body">

          <form method="post">

      <div class="form-group">
         <label>Scourse</label>
          <input type="text" id="txtstatename" name="txtstatename" required="required" 
                 placeholder="Please enter State" value="<?php echo $statename ?>" class="form-control" />
     </div>
     <div class="form-group">
         <label>Distance</label>
          <input type="text" id="txtstatename" name="txtstatename" required="required" 
                 placeholder="Please enter State" value="<?php echo $statename ?>" class="form-control" />
     </div>
     <div class="form-group">
         <label>Packaging type</label>
          <input type="text" id="txtstatename" name="txtstatename" required="required" 
                 placeholder="Please enter State" value="<?php echo $statename ?>" class="form-control" />
     </div>
   
    <hr/>

   <div class="text-right">
       <input type="hidden" id="hfFlag" name="hfFlag" value="<?php echo $flag ?>" />
       <input type="hidden" id="hfstateid" name="hfstateid" value="<?php echo $item_id ?>" />

         <button class="btn btn-outline-info"><i style='font-size:20px' class='fa fa-save'></i> Submit</button>
         <button class="btn btn-outline-danger" type="button" 
              onclick="window.location.replace('foodresultDetails')">
<i style='font-size:20px' class='fa fa-times'></i>
                        Cancel
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