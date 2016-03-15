<?php require '../includes/connect.php';
//Check if user is logged in
session_start();
if(isset($_SESSION['UserID'])){
}else{
    header('Location:Login.php');
}
?>

<?php 
     $userid=$_SESSION["UserID"];
     $result=$connection->query("SELECT * FROM user WHERE user_id=$userid");
     $row=$result->fetch_array(MYSQLI_BOTH);
     
     session_start();
     
     $_SESSION["Firstname"]=$row["user_firstname"];
     $_SESSION["Lastname"]=$row["user_lastname"];
     $_SESSION["Email"]=$row["user_email"];
     $_SESSION["Password"]=$row["user_password"];
     $_SESSION["Dob"]=$row["user_dob"];
?>

<?php
/* Update account*/
     if(isset($_POST['update'])){
         
         $updatefn=$_POST['user_firstname'];
         $updateln=$_POST['user_lastname'];
         $updateps=$_POST['user_password'];
         $updateemail=$_POST['user_email'];
         $updatedob=$_POST['user_dob'];
                
         $sql=$con->query("UPDATE user SET user_firstname='{$updatefn}',"
         . "user_lastname='{$updateln}',user_email='{$updateemail}',"
         . "user_password='{$updateps}',user_dob='{$updatedob}'");
         
         header('Location:ManageAccount.php');
     }




?>


<html>
<head>
  <title>Manage user account</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>


<body>

<nav class="navbar" id='cssmenu'>
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">OnlineAuction </a>
		<ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
    </div>       
       <div>
          <ul class="nav navbar-nav pull-right">
	   <li class="nav-item active">
	      <a class="nav-link" href='Logout.php'>Log out</a>
	    </li>
          </ul>
      </div>
  </div>
</nav>

    
<div class="container">
<h2>Your Account</h2>
<div class="form-group" id='register'>
  <form method='post' action='' name='UpadateUserForm' >
    E-mail:
    <input type="email" name="user_email" value="<?php echo$_SESSION["Email"]?>"><br>
    User password:
    <input type="password" name="user_password" value="<?php echo$_SESSION["Password"]?>"><br>
    First Name:
    <input type='text' name='user_firstname' size='30' value="<?php echo$_SESSION["Firstname"]?>"><br>
    Last Name:
    <input type='text' name='user_lastname' size='30' value="<?php echo$_SESSION["Lastname"]?>"><br>
    Birthday:
  <input type="date" name="user_dob" value="<?php echo$_SESSION["dob"]?>">
    <p><input type='submit' name='update' value='Update account'></p>
 </form>
 </div>
 


  
 </body>
</html>

