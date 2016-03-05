<?php require '../includes/connect.php';
//Check if user is logged in
session_start();
if(isset($_SESSION['user_id'])){
}else{
    header('Location:Login.php');
}
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



<nav class="navbar" id='cssmenu'>
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">OnlineAuction </a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="login_sucess.php">Home</a></li>
      <li><a href="#">Page 2</a></li>
      <li><a href="#">Page 3</a></li>ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> My Account</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Log out</a></li>
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
  
<!-- The search box; can search by categories -->
<form>
    <input type="text" placeholder="Search items..." required>
    <input type="button" value="Search">
</form>
</div>

<div class="col-md-4">

<ul>
<a href='#'>I want to see</a>
<a href='#'>I want to buy</a>
</ul>
</div>

<div class="col-md-8">
				<div class="card">
				    <div class= "card-block">
					<h4 class="card-title">
						My items  
					</h4>
					<p class="card-text">
						Here is links/images of the items I sell
                     </p>
                    </div>
				</div>
				<div class="card">
					<div class="card-block">
						<h4 class="card-title">
							My bids
						</h4>
						<p class="card-text">
							<strong> I like being on duty of grumping. It's in my blood.</stron>
						</p>
						</div>




</body>
</html>