<?php
require_once("PHPMailer/class.phpmailer.php");
require_once("PHPMailer/class.smtp.php");
require_once("PHPMailer/language/phpmailer.lang-uk.php");


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
         $mail->AddAddress('ella@sharklasers.com');
         $mail->Subject ="Registration Success";
         $mail->Body    ="Hi, your registration is successful!";
         $mail->SMTPSecure = 'tls';
         $mail->SMTPDebug = 2;

         $newuseremail = $mail->Send();
         echo 'Message sent';
         
         if(!$mail->Send())
{
   echo "Message could not be sent. <p>";
   echo "Mailer Error: " . $mail->ErrorInfo;
}
      
?>