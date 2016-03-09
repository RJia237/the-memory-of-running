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
      <li class="active"><a href="index.php">Home</a></li>
      </div>
</nav>


	  <form method="post" action='Addeditem3.php' enctype="multipart/form-data" class="form-horizontal" role="form">
  <div class="form-group">
    <label class="control-label col-sm-6" for="auction_item_name">Auction item name:</label>
    <div class="col-sm-10">
      <input type="text" name = "auction_item_name" class="form-control" id="input" placeholder="Enter the title for your item" ><br>
    </div>
	
  </div>
  <div class="form-group">
    <label class="control-label col-sm-6" for="auction_item_description">Auction item description:</label>
    <div class="col-sm-10"> 
      <input type="text" name= "auction_item_description" class="form-control" id="input" placeholder="Enter a description of your item" ><br>
    </div>
  </div>
	
  <div class="form-group">
    <label class="control-label col-sm-6" for="auction_item_starting_price">Auction starting price:</label>
    <div class="col-sm-10"> 
      <input type="number" name = "auction_item_starting_price" class="form-control" id="input" placeholder="Enter your starting price" ><br>
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-6" for="auction_item_reserve_price">Auction reserve price:</label>
    <div class="col-sm-10"> 
      <input type="number" class="form-control" name = "auction_item_reserve_price" id="input" placeholder="Enter your reserve price for your item" ><br>
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-6" for="category">Select a category </label>
    <select id = "category" name = "category">
               <option value = "clothe">Antique</option>
               <option value = "make_up">Clothing</option>
               <option value = "fancy_dress">Electronics</option>
             </select>
  
  </div>
  
  
  <div class="form-group" >
    <div class="col-sm-10"> 
	Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
  </div>

  <?php
if(isset($_POST['submit'])){
$target_dir = "";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;


$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . "." ;
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
echo "<img src=\$target_file>"; 
}
 ?>

  
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
 
 







</body>
</html>