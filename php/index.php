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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

</head>
<body> 
<!-- This is the navigation bar -->
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
		  <a class="nav-link" href='Login.php'>Login</a>
		<li><a class="nav-link" href='Register.php'>Register</a></li>
		</li>
	    </ul>
	</div>
</nav>
      
<!-- Jumbotron -->      
<div class="jumbotron text-center">
 <div class="container">
   <div class="card">
     <div class="row">
        <div class="col-md-8 col-md-offset-2">
    	    <h1 class="display-3">
    			Welcome to OnlineAuction
    	    </h1>
        </div>
     </div>
   </div>
  </div>

   
<div class="container">
    <form method='post' action='../includes/login.php' >
        <div class="form-group">
           <label class="sr-only">Email address</label>
           <input type="text" name="user_email" id='user_email' class="form-control" placeholder='Email'>
        </div>
           <div class="form-group">
           <label class="sr-only">Password</label>
           <input type="password" name="user_password" id="user_password" class="form-control" placeholder='Password'>
        <div class="checkbox">
           <label><input type="checkbox"> Remember me</label> 
              <button type="submit" name="login" class="btn btn-default">Sign in</button>
        </div>

    </form> 
</div>



      

      

		




</body>
</html>