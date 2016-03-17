<?php require '../includes/connect.php';
//Log out user
session_start();
unset($_SESSION['UserID']);
session_destroy();

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Online Auction</title>
<!-- Link to CSS file-->
<link rel="stylesheet" type="text/css" href="style.css">
<!-- Latest compiled and minified CSS from Bootstrap3-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
<!-- Link to Font Awesome-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="script.js"></script>
</head>

<body>
<!-- This is the navigation bar -->
<nav class="navbar" id='cssmenu'>
  <div class="container-fluid">
    <div class="navbar-header">
        <a class="navbar-brand" href="#">OnlineAuction </a>
     <ul class="nav navbar-nav pull-left">
      <li class="active"><a href="index.php">Home</a></li>
    </div>
   </div>
</nav>


<div> 
    <h4>You have logged out</h4>
</div>


</body>
</html>