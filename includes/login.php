<?php
  //connect to database
    include_once 'connect.php';

  //Email and password sent from the form
    $Email = $_POST['user_email'];
    $Password=$_POST['user_password'];
    
  //Mysql_num_row is counting table row
    $query = "SELECT * FROM user WHERE user_email = '$Email' AND user_password = '$Password'";
    $results=mysqli_query($connection $query);
    
  // Mysql_num_row is counting table row
    $count=mysqli_num_rows($result);
    
   // If result matched $Email and $Password, table row must be 1 row
    if($count==0){
    while($row=mysqli_fetch_assoc($results)
    {
    $dbuser_email=$row['user_email'];
    $dbuser_password=$row['user_password'];
    $dbuser_firstname=$row['user_firstname'];
    $dbuser_lastname=$row['user_lastname'];
    $dbuser_dob=$row['user_dob'];
    }
    
    
    if($Email == $dbuser_email && $Password==$udbuser_password)
{
   session_start();
   $_SESSION['user_sess']=$Email;
   
// Register $Email, $Password and redirect to file "login_success.php"
    
    header("location:../php/user_login.php");
    }
      
else {
echo "Wrong Username or Password";
}


?>
  
  
