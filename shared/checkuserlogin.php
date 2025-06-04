<?php

   if(!$_SESSION["logstatus"])
     {
       $_SESSION["message"]="Sorry you are not logged  on...Please..Login...to...continue...!!";
       header("Location:signin");
     }
?>
