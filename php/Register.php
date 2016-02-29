<?php require "../includes/connect.php";?>

<html>
<head>
  <title>Register</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body>


<div class="container">
<h2>Create a New Account</h2>
<div class="form-group" id='register'>
  <form method='post' action='../includes/registerNewUser.php' name='newUserForm'>
    E-mail:
    <input type="email" name="user_email"><br>
    User password:
    <input type="password" name="user_password"><br>
    First Name:
    <input type='text' name='user_firstname' size='30'><br>
    Last Name:
    <input type='text' name='user_lastname' size='30'><br>
    Birthday:
  <input type="date" name="user_dob">
    <p><input type='submit' name='submit' value='Create New User'></p>
 </form>
 </div>
 
    <p>
      <a href="Register.php">Return to form</a><br />
      <a href="index.php">Go to index</a>
    </p>


  
 </body>
</html>