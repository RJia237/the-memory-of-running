<?php
require "connect.php";



     if(isset($_POST['submit'])){
     session_start();
        $email = $_POST['user_email'];
        $password = $_POST['user_password'];
        $firstname = $_POST['user_firstname'];
        $lastname = $_POST['user_lastname'];
        $dob = $_POST['user_dob'];
        
        //store hashed password
        $StorePassword = password_hash($password, PASSWORD_BCRYPT, array('cost'=>10));
        
        $query= "INSERT INTO user (user_email, user_password,user_firstname,"
              . "user_lastname,user_dob)"
              . "VALUES ('$email','$StorePassword','$firstname','$lastname','$dob')";
        $result = mysqli_query($connection, $query);
     }
        
        if(!$result){die('Invalid query:'.mysqli_error());
        }else{      
require_once("PHPMailer/class.phpmailer.php");
require_once("PHPMailer/class.smtp.php");
require_once("PHPMailer/language/phpmailer.lang-uk.php");
require_once("PHPMailer/PHPMailerAutoload.php");

            //send email to user   
         $mail=new PHPMailer();
        
         $mail->IsSMTP();
         $mail->Host   ="smtp.gmail.com";
         $mail->Port   =587;
         $mail->SMTPAuth=flase;
         $mail->Username ='rjia237@gmail.com';
         $mail->Password ='nian1994223';
         
         
         $mail->FromName="OnlineAuction";
         $mail->From    ="rjia237@gmail.com";
         $mail->AddAddress($email,$firstname);
         $mail->Subject ="Registration Success";
         $mail->Body    ="Hi, your registration is successful!";

         $newuseremail = $mail->Send();
         //echo 'Message sent';     
} 
if ($newuseremail)
{
    header('Location:../php/Login.php');
}else   
{
   echo "Message could not be sent. ";
} 

?>