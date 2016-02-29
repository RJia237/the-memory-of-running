<?php 
     include 'connection.php';
   
   
     if(!$_POST['submit']){
        echo"Please fill out the form";
        header('Location: index.php');
    }else{
    mysql_query (
            "INSERT INTO user(`user_id`, `user_email`, `user_password`,`user_firstname`
        `user_lastname`,`user_dob`)
         VALUES(NULL, '$_POST['user_id']', '$_POST['user_email']','$_POST['user_password']',
                        '$_POST['user_firstname']','$_POST['user_lastname']', 
                            '$_POST['user_dob']')") or die(msql_error());
    echo "New user account has been created!";
    header('Location:index.php);
  }
?>