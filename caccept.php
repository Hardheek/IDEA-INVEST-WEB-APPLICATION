<?php
    include('functions.php');

    session_start(); 
    $email = $_SESSION['semail'];
    

    
    

    $query = "select * from `sponsorrequest` where `sponsorrequest`.`email` = '$email'; ";




    if(count(fetchAll($query)) > 0){
        foreach(fetchAll($query) as $row){


            $email = $row['email'];
            $cemail  = $row['cemail'];
            $startupname = $row['startupname'];
            $share = $row['share'];
            $amount = $row['amount'];
            
            $query = "INSERT INTO `sponmessage` (`email`, `cemail`, `startupname`, `share`, `amount`) VALUES ( '$email', '$cemail', '$startupname', '$share', '$amount');";

            
            
        }        
        $query .= "DELETE FROM `sponsorrequest` WHERE `sponsorrequest`.`cemail` = '$cemail' ";
        if(performQuery($query)){
            echo "Account has been accepted.";
            echo "$email";
        }else{
            echo "Unknown error occured. Please try again.";
        }
    }else{
        echo "Error occured.";
    }
    
?>
<br/><br/>
<a href="myrequests.php">Back to DashBoard</a>
