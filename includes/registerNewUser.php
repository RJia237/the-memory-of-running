<?php
ob_start(); 
session_start();


require "connect.php";

     if(isset($_POST['submit'])){
         
        $email = $_POST['user_email'];
        $password = $_POST['user_password'];
        $firstname = $_POST['user_firstname'];
        $lastname = $_POST['user_lastname'];
        $dob = $_POST['user_dob'];
        
        $query= "INSERT INTO user (user_email, user_password,user_firstname,"
                . "user_lastname,user_dob)VALUES ('$email','$password' , '$firstname','$lastname','$dob')";
        $result = mysqli_query($connection, $query);
     
       
       header('Location:../php/Login.php');

     }
     
     
     if($result){
         header('Location:send_email.php');
     }
     
ob_end_flush();      
?>
  