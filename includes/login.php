<?php 
ob_start(); 
session_start();

require 'connect.php';

   
    if(isset($_POST['login'])){
        $EM=$_POST['email'];
        $PS=$_POST['password'];
        
   $result=$connection->query("SELECT * FROM user WHERE user_email='$EM'AND user_password='$PS' ");
    
    $row= mysqli_fetch_assoc($result);
    $_SESSION['UserID']=$row['user_id'];
    
    header('Location:../php/login_success.php');
        
    }else{
        echo"Error! Can't login.";
    }
    
ob_end_flush(); 
?>
 
    
    
    
    
    
    
    
    
    
    
    
    
     

   
     
   
   
    

  
