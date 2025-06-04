<?php
 include_once("../shared/conn.php");
 $resp = new stdClass();  

 try
 {  
     if($_SERVER['REQUEST_METHOD'] == "POST")
         {

            $data = file_get_contents("php://input");
            $obj = json_decode($data); 

            $item_id=$obj->item_id; 
            $status=$obj->Status;

            mysqli_query($conn,"update cfood set status='$status' where item_id=$item_id");
                      
           $resp->ResponseCode = 1;
            $msg="Request Approved Successfully for Request Id:--$item_id..!!";

             if($status=='R')$msg="Request Rejected for Request Id:--$item_id..!!";
             elseif($status=='T')
              $msg="Return Request for Request Id:--$item_id..!!";
             
             $resp->ResponseText= $msg; 
                     
        }

}
    catch (Exception $ex) 
      {
        $resp->ResponseCode = 0;
        $resp->FailureText = $ex->getMessage();
       }  
      

    mysqli_close($conn);
    header('Content-Type: application/json');
   
    echo json_encode($resp);
?>