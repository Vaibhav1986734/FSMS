 <?php
         if (session_status() == PHP_SESSION_NONE) 
                session_start();

             $_SESSION["username"]="guest";
             $_SESSION["logstatus"]="f";
             $_SESSION["rolename"]="guest";

           header("Location:index.php");
    ?>