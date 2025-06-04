<div id="layoutSidenav_nav">
<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion"> 		
    <div class="sb-sidenav-menu">
         <?php
         include_once("shared/conn.php");
            if (session_status() == PHP_SESSION_NONE) 
              session_start();

              if(isset($_SESSION["email"]) && 
                isset($_SESSION["logstatus"]) && 
               $_SESSION["role"]=="admin")
                 {
                    $username="guest";

                    if(isset($_SESSION["email"]))
                    $email=$_SESSION["email"];

                    $rs=mysqli_query($conn,"SELECT * FROM users WHERE email='$email'") or die("Error: ".mysqli_error($conn));
                    if($row=mysqli_fetch_row($rs))
                    {
                       $username=$row[1];
                       $Address=$row[5];
                       $role=$row[6];
                    }
                    
                ?>
                     
      <div class="nav">
            <div class="sb-sidenav-menu-heading text-center text-white text-capitalize " style="font-size:15px;">
                <h5><?php echo "$username"  ?><br/></h5><hr color=white>
                <?php echo "Role : $role" ?><br/>       
                <?php echo "Address : $Address" ?><br/><hr color=white>        
                <p class="mt-2" >
                    <?php
                        date_default_timezone_set("Asia/Calcutta");
                    ?>
                <u>Login Date-Time</u><br> <?php echo date('d-M-Y | h:i a')?>
                </p>
            </div>
                    <div class="sb-sidenav-menu-heading">Home</div>

                    <a class="nav-link" href="">
                        <div class="sb-nav-link-icon">
                            <i class="fa fa-home"></i>
                        </div>          
                        Dashboard
                    </a>

                    <div style="border-bottom: 1px solid" 
		                class="ml-3 mr-3 mt-2 mb-2 text-dark">
                     </div>
                    
                    <div class="sb-sidenav-menu-heading pt-2">
                        <i class="fa fa-file"></i>
                        &nbsp;&nbsp;Master Files
                    </div>

                    <a class="nav-link" href="./itemDetails"> 
                    <div class="sb-nav-link-icon">
                        <i class="fa fa-users"></i>
                        </div>                   
                            food Details Master
                    </a> 
                    
                    <a class="nav-link" href="FoodresultDetails"> 
                    <div class="sb-nav-link-icon">
                        <i class="fa fa-users"></i>
                        </div>      
                           final Food Result 
                    </a>  

                    
                    <a class="nav-link" href="contactDetails"> 
                    <div class="sb-nav-link-icon">
                        <i class="fa fa-users"></i>
                        </div>      
                            Contact Master
                    </a>  
                    <a class="nav-link" href="feedbackDetails"> 
                    <div class="sb-nav-link-icon">
                        <i class="fa fa-users"></i>
                        </div>      
                            Feedback Master
                    </a>  
                    

                        <div style="border-bottom: 1px solid" 
                                class="ml-3 mr-3 mt-2 mb-2 text-dark">
                        </div>
                                
                        <a class="nav-link" href="signout.php">
                            <div class="sb-nav-link-icon">
                                    <i class="fa fa-power-off"></i>
                            </div>
                                SignOut
                        </a>
                </div>
             <?php
              }
          
               else if(isset($_SESSION["email"]) && 
               isset($_SESSION["logstatus"]) && 
               $_SESSION["role"]=="farmer")
                  {
                    $username="guest";

                    if(isset($_SESSION["email"]))
                    $email=$_SESSION["email"];

                    $rs=mysqli_query($conn,"SELECT * FROM users WHERE email='$email'") or die("Error: ".mysqli_error($conn));
                    if($row=mysqli_fetch_row($rs))
                    {
                       $username=$row[1];
                       $Address=$row[5];
                       $role=$row[6];
                    }
                    
                ?>
                     
      <div class="nav">
            <div class="sb-sidenav-menu-heading text-center text-white text-capitalize " style="font-size:15px;">
                <h5><?php echo "$username"  ?><br/></h5><hr color=white>
                <?php echo "Role : $role" ?><br/>       
                <?php echo "Address : $Address" ?><br/><hr color=white>        
                <p class="mt-2" >
                    <?php
                        date_default_timezone_set("Asia/Calcutta");
                    ?>
                <u>Login Date-Time</u><br> <?php echo date('d-M-Y | h:i a')?>
                </p>
            </div>

                        <a class="nav-link" href="FarmerHome">
                            <div class="sb-nav-link-icon">
                                <i class=" fa fa-home"></i>
                            </div>
                                Dashboard
                        </a>

                    <div style="border-bottom: 1px solid" 
                        class="ml-3 mr-3 mt-2 mb-2 text-dark">
                    </div>
                                        
                    <div class="sb-sidenav-menu-heading pt-2">
                        <i class="fa fa-file"></i>
                         &nbsp;&nbsp;Document Menus
                    </div>

                <a class="nav-link" href="itemDetails">   
                    <div class="sb-nav-link-icon">
                        <i class="fa fa-users"></i>
                    </div>                        
                    food Details                      
                </a> 

                
                <div style="border-bottom: 1px solid" 
                        class="ml-3 mr-3 mt-2 mb-2 text-dark">
                </div>
                <a class="nav-link" href="cfoodDetails">   
                    <div class="sb-nav-link-icon">
                        <i class="fa fa-users"></i>
                    </div>                        
                    Order food                       
                </a> 


                
                <div style="border-bottom: 1px solid" 
                        class="ml-3 mr-3 mt-2 mb-2 text-dark">
                </div>
                <a class="nav-link" href="acceptfDetails">   
                    <div class="sb-nav-link-icon">
                        <i class="fa fa-users"></i>
                    </div>                        
                  Accept food Order                       
                </a> 
                <a class="nav-link" href="rejectfDetails">   
                    <div class="sb-nav-link-icon">
                        <i class="fa fa-users"></i>
                    </div>                        
                  Reject food Order                       
                </a> 

                <a class="nav-link" href="feedback"> 
                    <div class="sb-nav-link-icon">
                        <i class="fa fa-users"></i>
                        </div>      
                            Feedback form
                    </a> 
                                                    
                                                
                    

                                            
                <div style="border-bottom: 1px solid" 
                    class="ml-3 mr-3 mt-2 mb-2 text-dark">
                </div>
                                                    
            <a class="nav-link" href="signout">
                <div class="sb-nav-link-icon">
                            <i class="fa fa-power-off"></i>
                </div>
                                SignOut
            </a>
            </div>

           <?php
               }
               else if(isset($_SESSION["email"]) && 
               isset($_SESSION["logstatus"]) && 
               $_SESSION["role"]=="consumer")
                  {
                    $username="guest";

                    if(isset($_SESSION["email"]))
                    $email=$_SESSION["email"];

                    $rs=mysqli_query($conn,"SELECT * FROM users WHERE email='$email'") or die("Error: ".mysqli_error($conn));
                    if($row=mysqli_fetch_row($rs))
                    {
                       $username=$row[1];
                       $Address=$row[5];
                       $role=$row[6];
                    }
                    
                ?>
                     
      <div class="nav">
            <div class="sb-sidenav-menu-heading text-center text-white text-capitalize " style="font-size:15px;">
                <h5><?php echo "$username"  ?><br/></h5><hr color=white>
                <?php echo "Role : $role" ?><br/>       
                <?php echo "Address : $Address" ?><br/><hr color=white>        
                <p class="mt-2" >
                    <?php
                        date_default_timezone_set("Asia/Calcutta");
                    ?>
                <u>Login Date-Time</u><br> <?php echo date('d-M-Y | h:i a')?>
                </p>
            </div>

                        <a class="nav-link" href="consumerdashbord">
                            <div class="sb-nav-link-icon">
                                <i class=" fa fa-home"></i>
                            </div>
                                Dashboard
                        </a>

                    <div style="border-bottom: 1px solid" 
                        class="ml-3 mr-3 mt-2 mb-2 text-dark">
                    </div>
                                        
                    <div class="sb-sidenav-menu-heading pt-2">
                        <i class="fa fa-file"></i>
                         &nbsp;&nbsp;Document Menus
                    </div>

                <a class="nav-link" href="viewitemDetails">   
                    <div class="sb-nav-link-icon">
                        <i class="fa fa-users"></i>
                    </div>                        
                    food Details                      
                </a> 
                <a class="nav-link" href="requestfDetails">   
                    <div class="sb-nav-link-icon">
                        <i class="fa fa-users"></i>
                    </div>                        
                    Order food                       
                </a> 

                
                <div style="border-bottom: 1px solid" 
                        class="ml-3 mr-3 mt-2 mb-2 text-dark">
                </div>
                <a class="nav-link" href="acceptfDetailscons">   
                    <div class="sb-nav-link-icon">
                        <i class="fa fa-users"></i>
                    </div>                        
                   confirm Order food                       
                </a>
                <a class="nav-link" href="rejectfDetailscons">   
                    <div class="sb-nav-link-icon">
                        <i class="fa fa-users"></i>
                    </div>                        
                   Reject Order food                       
                </a>

                
                <a class="nav-link" href="feedback"> 
                    <div class="sb-nav-link-icon">
                        <i class="fa fa-users"></i>
                        </div>      
                            Feedback form
                    </a> 
                                                    
                                                
                    

                                            
                <div style="border-bottom: 1px solid" 
                    class="ml-3 mr-3 mt-2 mb-2 text-dark">
                </div>
                                                    
            <a class="nav-link" href="signout">
                <div class="sb-nav-link-icon">
                            <i class="fa fa-power-off"></i>
                </div>
                                SignOut
            </a>
            </div>

           <?php
               }

               else if(isset($_SESSION["rolename"]) && 
               isset($_SESSION["logstatus"]) && 
               $_SESSION["rolename"]=="Faculty")
                  {
                    $username="guest";
                    $facname="";
                    $photo="";
                    $desig="";
                    $branch="";
                    $branchid="";

                    if(isset($_SESSION["username"]))
                    $username=$_SESSION["username"];

                    $rs=mysqli_query($con,"SELECT facultid,facultname,d.designationname,b.branchname,photo,fbranchid FROM faculties f ".
                    "inner JOIN designation d on f.fdesignationid=d.designationid INNER JOIN branches b on f.fbranchid=b.branchid ".
                    "WHERE fusername='$username'") or die("Error: ".mysqli_error($con));
                    if($row=mysqli_fetch_row($rs))
                    {
                       $facname=$row[1];
                       $desig=$row[2];
                       $branch=$row[3];
                       $photo=$row[4];
                       $branchid=$row[5];
                    }
                }
            ?>
        </div>
    </nav>
</div>