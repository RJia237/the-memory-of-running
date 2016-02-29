<?php include "connect.php";?>
<?php

     if (isset($_POST['submit'])){
     
     session_start();
        $email = $_POST['user_email'];
        $password = $_POST['user_password'];
        $firstname = $_POST['user_firstname'];
        $lastname = $_POST['user_lastname'];
        $dob = $_POST['user_dob'];
        
             $query= "INSERT INTO user (user_email, user_password,user_firstname,user_lastname,user_dob)
                VALUES ('$email','$password' , '$firstname','$lastname','$dob')";
        
        $result = mysqli_query($connection, $query); 
        if($result){
    echo "New record created successfully";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($connection);
}
        
        mysqli_close($connection);
        
        }
      
?>
