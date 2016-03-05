<?php require '../includes/connect.php';
//Log out user
session_start();
unset($_SESSION['user_id']);
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
</head>

<body> 
<!-- This is the navigation bar -->
<nav class="navbar">
		<div class='container'>
		<ul>
                    <li><a>Your account</a></li>
                    <br><?php echo $_SESSION["user_id"]; ?>
		</ul>
		</div>
</nav>

<div>
<a class="navbar-brand white-title">Welcome to Online Auction!</a>
</div>


<div class="text-centre">
<!--Dropdown button-->
<div class="dropdown">
    <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">All categories
    <span class="caret"></span></button>
     <ul class="dropdown-menu">
      <li class="dropdown-header">Categories</li>
      <li ><a tabindex="-1" href="#">Clothes</a></li>
      <li ><a tabindex="-1" href="#">Electronics</a></li>
      <li ><a  tabindex="-1" href="#">Toys</a></li>
    </ul>
  
<!-- The search box; can search by categories --!>
<form>
    <input type="text" placeholder="Search items..." required>
    <input type="button" value="Search">
</form>
</div>




</body>
</html>