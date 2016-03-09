<?php require '../includes/connect.php'; ?>

<?php
//display items.
$message='';
$sql="SELECT * FROM item";
$result=mysqli_query($connection, $sql);
        if($result->error){
            $message="Error Connection!";
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
<nav class="navbar" id='cssmenu'>
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">OnlineAuction </a>
    </div>
    <ul class="nav navbar-nav pull-left">
      <li class="active"><a href='AddItem.php'>I want to sell</a></li>
    </ul>
    <ul class="nav navbar-nav pull-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> My Account</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Log out</a></li>
    </ul>
  </div>
</nav>



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

<div class="page open">
    <?php 
    while ($row=$result->fetch_assoc()){
?>
    <div class="section">
          <ul class="reset titles"> 
                <li> <img src="data:image/jpeg;base64,<?php echo base64_encode($row['item_image']); ?>"
                 style="width:250px;height:200px"/>
                    <h4 class="h4">
                        <?php echo $row['item_name'];?></h4>
                    <p> From £<?php echo $row['item_selling_price'];?> </p>
                    <a class="btn btn-info" name='details' href="#">View the item</a>
                </li>
           </ul>
    </div>
<?php }//end of loop?>
</div> 
             

    

</body>
</html>