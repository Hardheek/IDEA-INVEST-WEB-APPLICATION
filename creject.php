<?php
    include('functions.php');
    session_start(); 
    $email = $_SESSION['semail'];
    
    
    $id = "0";

    
    $query = "DELETE FROM `sponsorrequest` WHERE `sponsorrequest`.`email` = '$email' ";
        if(performQuery($query)){
            echo "Account has been rejected.";
        }else{
            echo "Unknown error occured. Please try again.";
        }

?>
<br/><br/>
<a href="myrequests.php">Back To dashboard</a>

