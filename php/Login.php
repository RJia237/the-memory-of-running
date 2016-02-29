<?php
     session_start();
     
     if($_POST['login']){
     include_once("../includes/connect.php");
     $username



<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>

<body>
<h2>Please Login</h2>
<form class="form-inline" method="post" action="includes/login.php" >
  <div class="form-group">
    <label class="sr-only" for="exampleInputEmail3">Email address</label>
    <input type="text" name="user_email" class="form-control" placeholder="Email">
  <div class="form-group">
    <label class="sr-only" for="exampleInputPassword3">Password</label>
    <input type="password" name="user_password "class="form-control" placeholder="Password">
  <div class="checkbox">
    <label>
      <input type="checkbox"> Remember me</label>
      <button type="submit" name="submit "class="btn btn-default" action="../includes/login.php">Sign in</button>
</form>



</body>
</html