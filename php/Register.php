<html>
<head>
  <title>Register</title>
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
      <li><a href="#">Products</a></li>
      </div>
        
        <div>
			<ul class="nav navbar-nav pull-right">
				<li class="nav-item active">
					<a class="nav-link" href='Login.php'>Login</a>
				</li>
			</ul>
		</div>
</nav>

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
 


  
 </body>
</html>