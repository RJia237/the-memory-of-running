<?php require '../includes/connect.php';
//Check if user is logged in
session_start();
if(isset($_SESSION['UserID'])){
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.122.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
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
                    <li class="active"><a href="login_success.php">Home</a></li>
      </div>
</nav>


<form method="post" action='../includes/addeditem.php' enctype="multipart/form-data" class="form-horizontal" role="form">
  <div class="form-group">
    <label class="control-label" for="item_name">Auction item name:</label>
    <div class="col-sm-10">
      <input type="text" name = "item_name" class="form-control" id="input" placeholder="Enter the title for your item" ><br>
    </div>
	
  </div>
  <div class="form-group">
    <label class="control-label" for="item_description">Auction item description:</label>
    <div class="col-sm-10"> 
      <input type="text" name= "item_description" class="form-control" id="input" placeholder="Enter a description of your item" ><br>
    </div>
  </div>
	
  <div class="form-group">
    <label class="control-label" for="item_selling_price">Auction starting price:</label>
    <div class="col-sm-10"> 
      <input type="number" name = "item_selling_price" class="form-control" id="input" placeholder="Enter your starting price" ><br>
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label" for="item_reserve_price">Auction reserve price:</label>
    <div class="col-sm-10"> 
      <input type="number" class="form-control" name = "item_reserve_price" id="input" placeholder="Enter your reserve price for your item" ><br>
    </div>
  </div>
  
  <div class="form-group">
<?php
$catlist = "SELECT * FROM item_category";
$c_query = mysqli_query($catlist);
$category = mysqli_fetch_assoc($c_query);
if (!$c_query = $connection->query($catlist)) {
	die (' $connection->error');
}
?>
      <div class="row">
         <div class="col-xs-8 col-xs-offset-2">
		<div class="input-group">
                <div class="input-group-btn search-panel"> 
                   <select type="button" name='categorylist' class="btn btn-default dropdown-toggle"
                           value="Categories" data-toggle="dropdown">	
                     <?php while ($category=$c_query->fetch_assoc()) {?>
                        <option  value="<?php echo $category["category_id"]; ?>">
                     <?php echo $category["category_description"];?></option>
           <?php };//end of the while loop?>
                    </select> 
                </div>
  </div>
  
  
  <div class="form-group" >
    <div class="col-sm-10"> 
	Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
  </div>
     
  <div class="form-group"> 
    <div class="col-sm-offset-6 col-sm-6">
      <div class="checkbox">
        <label><input type="checkbox"> Remember me</label>
      </div>
    </div>
  
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-6 col-sm-6">
      <input type="submit" name = "submit" class="btn btn-default">
    </div>
  </div>
</form>
 







</body>
</html>