<?php 

require '../includes/connect.php';
//Check if user is logged in
session_start();
if(isset($_SESSION['UserID'])){
}else{
    header('Location:Login.php');
}
?>

<?php 
require '../includes/connect.php';
/*define data upload function*/
function dbRowInsert($connection, $table_name, $form_data)
{
    // retrieve the keys of the array (column titles)
    $fields = array_keys($form_data);
    
    // build the query
    $sql = "INSERT INTO ".$table_name."
    (`".implode('`,`', $fields)."`)
    VALUES('".implode("','", $form_data)."')";
    // run and return the query result resource
   //echo $sql;
    return mysqli_query($connection, $sql);

}


//set auction closing date
$dateclose = date_create($_POST['end_date'])->format('Y-m-d H:i:s');

/*save image in the $imagedata*/
$imagedata = file_get_contents($_FILES["image"]["tmp_name"]);


//insert item info into database
if(isset($_POST['submit'])){
 

$auction_data = array(
    "name" => $_POST["name"],
    "description" => $_POST["description"],
    "category_id" => $_POST[ "categorylist"],
    "seller_id"=>$_SESSION["UserID"],
    "start_date"=>null,
    "end_date"=>$dateclose,
    "starting_price" => $_POST['starting_price'],
    "reserve_price" => $_POST["reserve_price"],
    "image"=>$imagedata
);



dbRowInsert($connection,"auction", $form_data);

header('Location:ManageAccount.php');
}


$newaucID=$connection->query("SELECT id FROM auction WHERE seller_id={$_SESSION["UserID"]}");


$aucid=mysqli_fetch_assoc($newaucID);
session_start();
$_SESSION["bidID"]=$aucid;


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


<form method="POST" action='' enctype="multipart/form-data" class="form-horizontal">
  <div class="form-group">
    <label class="control-label" for="name">Auction item name:</label>
    <div class="col-sm-10">
      <input type="text" name = "name" class="form-control" id="input" placeholder="Enter the title for your item" ><br>
    </div>
	
  </div>
  <div class="form-group">
    <label class="control-label" for="description">Auction item description:</label>
    <div class="col-sm-10"> 
      <input type="text" name= "description" class="form-control" id="input" placeholder="Enter a description of your item" ><br>
    </div>
  </div>
	
  <div class="form-group">
    <label class="control-label" for="starging_price">Auction starting price:</label>
    <div class="col-sm-10"> 
      <input type="number" name = "starting_price" class="form-control" id="input" placeholder="Enter your starting price" ><br>
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label" for="reserve_price">Auction reserve price:</label>
    <div class="col-sm-10"> 
      <input type="number" class="form-control" name = "reserve_price" id="input" placeholder="Enter your reserve price for your item" ><br>
    </div>
  </div>
  
   <div class="form-group">
    <label class="control-label" for="end_date">Auction close on:</label>
    <input type="datetime-local" class="form-control" name = "end_date" id="input" >
   </div>
    
    
  <div class="form-group">
<?php
$catlist = "SELECT * FROM category";
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
                        <option  value="<?php echo $category["id"]; ?>">
                     <?php echo $category["name"];?></option>
           <?php };//end of the while loop?>
                    </select> 
                </div>
              </div>
         </div>
      </div>
  </div>
  
  
  <div class="form-group" >
    <div class="col-sm-10"> 
	Select image to upload:
    <input type="file" name="image" id="fileToUpload">
  </div>
     
    <div class="col-sm-offset-6 col-sm-6">
      <input type="submit" name = "submit" class="btn btn-default">
    </div>
  </div>
       
</form>
 







</body>
</html>