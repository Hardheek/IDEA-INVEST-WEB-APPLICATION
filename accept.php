<?php
    include('functions.php');
    session_start(); 
   
    
    $id = "0";

    $query = "select * from `requests` where `requests`.`id` = '$id'; ";

    if(count(fetchAll($query)) > 0){
        foreach(fetchAll($query) as $row){
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $email = $row['email'];
            $password = $row['password'];
            $phone = $row['phone'];
            $role = $row['role'];
            $query = "INSERT INTO `account` (`phone`, `firstname`, `lastname`, `email`, `role`, `password`) VALUES ( '$phone', '$firstname', '$lastname', '$email', '$role', '$password');";
            
        }
        $query .= "DELETE FROM `requests` WHERE `requests`.`email` = '$email';";
        if(performQuery($query)){
            echo "Account has been accepted.";
        }else{
            echo "Unknown error occured. Please try again.";
        }
    }else{
        echo "Error occured.";
    }
    
?>
<br/><br/>
<a href="home.php">Back to DashBoard</a>
