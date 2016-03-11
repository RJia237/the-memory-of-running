<?php require '../includes/connect.php';
//Check if user is logged in
session_start();
if(isset($_SESSION['user_id'])){
}else{
    header('Location:Login.php');
}
?>

<?php
//display items.
$message='';
$sql="SELECT * FROM item";
$result=mysqli_query($connection, $sql);
        if($connection->error){
            $message= $connection->error;
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
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="script.js"></script>
</head>

<body>

<?php require '../includes/navbar.php';?>


<div class="card-text">
<a class="navbar-brand white-title">Welcome to Online Auction!</a>
</div>

<!--Search by categories-->
<div class="container">
    <form action='../includes/dropdown_category.php' method='GET'>
      <div class="row">
         <div class="col-xs-8 col-xs-offset-2">
		<div class="input-group">
                <div class="input-group-btn search-panel">
                    <button type="button" name='categories' class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    	<span id="search_concept">Categories</span> <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#its_equal">Antiques</a></li>
                      <li><a href="#greather_than">Clothing</a></li>
                      <li><a href="#less_than">Electronics</a></li>
                      <li class="divider"></li>
                      <li><a href="#">All categories</a></li>
                    </ul>
                </div>
                <input type="hidden" name="search_param" value="all" id="search_param">         
                <input type="text" class="form-control" name="search" placeholder="Search term...">
                <span class="input-group-btn">
                   <button class="btn btn-default" name='search' type="button"><span class="glyphicon glyphicon-search"></span></button>
                </span>
            </div>
         </div>
      </div>
    </form>
</div>
    
<!--product display-->  

<div class="container">
    <?php 
    while ($row=$result->fetch_assoc()){
?>
    <div class="row-fluid pull-left">
          <ul class="reset titles"> 
                <li> <img src="data:image/jpeg;base64,<?php echo base64_encode($row['item_image']); ?>"
                 style="width:200px;height:230px"/>
                    <h4 class="h4">
                        <?php echo $row['item_name'];?></h4>
                    <p> From £<?php echo $row['item_selling_price'];?> </p>
                    <a class="btn btn-info" name='details' href="ItemDetail.php?item_id=<?php echo $row[item_id];?>">View the item</a>
                </li>
           </ul>
    </div>
<?php }//end of loop?>
</div> 
             

    

</body>
</html>