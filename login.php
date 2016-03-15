<?php 

require 'connect.php';
   
if(isset($_POST['login'])){
        $EM=$_POST['user_email'];
        $PS=$_POST['user_password'];
        
   $result=$connection->query("SELECT * FROM user WHERE user_email='$EM'");
    
   $row= $result->fetch_assoc();
}
   
   if(mysqli_num_rows($row)===0){
       echo "User not found, please register.";   
   }


    if(password_verify($PS,$row["user_password"]))
    {
       //echo "password valid!";
       session_start();
       $_SESSION["UserID"]=$row['user_id'];
       header('Location:../php/login_success.php');
    
    }else{
     session_start();

     $_SESSION['LoginFail']='YES';
    }

  