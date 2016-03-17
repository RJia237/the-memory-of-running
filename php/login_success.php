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
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="script.js"></script>
</head>

<body>

<?php include '../includes/navbar.php';?>


<div class="card-text">
<a class="navbar-brand white-title">Welcome to Online Auction!</a>
</div>

<!--Search by categories-->
    <form action='login_success.php' method='GET'>
        <div class='container-fluid' id='categorylist'>
        <?php
        //output categories from database
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
                        <option value="<?php echo $category["id"]; ?>">
                       <?php echo $category["name"];?></option>
           <?php };//end of the while loop?>
                    </select> 
                </div>
                   <input type="text" class="form-control" name="item" placeholder="Search item...">
                   <span class="input-group-btn">
                   <input class="btn btn-default" name='search' type="submit" value='Search'>
                   </span>
               </div>
          </div>
       </div>
    </div>
  
 <?php
//display all active items.
$allitems="SELECT * FROM auction WHERE CURRENT_TIMESTAMP() < auction.end_date";
$result_item_query=mysqli_query($connection, $allitems);
        if(!$result_item_query){
            echo $connection->error;
        }    
    
//Search by keywords or by cateogries
if (isset($_GET['search'])&& !empty($_GET['item']) && !empty($_GET['categorylist'])){
    //search by category and keywords
	$product = mysqli_real_escape_string($connection, $_GET['item']);
	
        $categorylist = mysqli_real_escape_string($connection, $_GET['categorylist']);
	$product_query = "SELECT * FROM auction, category "
                        . "WHERE auction.category_id=category.id "
                        . "AND auction.name LIKE '%".$product."%' "
                        . "AND auction.category_id=".$categorylist;
        
	$result_item_query = mysqli_query($connection, $product_query);     
        
}elseif(isset($_GET['search'])&& !empty($_GET['categorylist'])) {
        //search by category
	// $product = mysqli_real_escape_string($connection, $_GET['item']);
	$categorylist = mysqli_real_escape_string($connection, $_GET['categorylist']);
	$product_query ="SELECT * FROM auction, category "
                       . "WHERE auction.category_id=category.id "
                       . "AND auction.category_id=".$categorylist;
	$result_item_query = mysqli_query($connection, $product_query);
       
}elseif(isset($_GET['search'])&& !empty($_GET['item'])) {
        //search by key words
    
	$product = mysqli_real_escape_string($connection, $_GET['item']);
        //$categorylist = mysqli_real_escape_string($con, $_GET['categorylist']);
	$product_query = "SELECT * FROM auction, category "
                       . "WHERE auction.category_id=category.id "
                       . "AND auction.name LIKE '%".$product."%'";
	$result_item_query = mysqli_query($connection, $product_query); 
        
}elseif(isset($_GET['search'])&& empty($_GET['item']) && empty($_GET['categorylist'])){
        //search without defining 
    $result_item_query = mysqli_query($connection, $allitems);
   
}       
    

    //check query
    if(!$result_item_query ){
        die('Invalid query: ' . mysqli_error($connection));
    }

        if (mysqli_num_rows($result_item_query)==0 && isset($_GET["categorylist"]))
{
     echo "Please Select a different Category";
}     
        if (mysqli_num_rows($result_item_query)==0 && isset($_GET['search']))
{
      echo "There was no results found.";
} 
$row = mysqli_fetch_assoc($result_item_query);



?>        
        

    
<!--product display-->  

<div class="container" id="itemdisplay">
    <form action="" method="POST">
    <?php 
    $i=0;
    while ($row = mysqli_fetch_assoc($result_item_query)){
        if($i%3===0){?>
    <div class="row-fluid pull-left">
          <ul class="items">
                <li> <img src="data:image/jpeg;base64,<?php echo base64_encode($row['image']); ?>"
                 style="width:200px;height:230px"/>
                    <h4 class="h4">
                        <?php echo $row['name'];?></h4>
                    <p> From £<?php echo $row['starting_price'];?> </p>
                    <a class="btn btn-info" name='details' href="ItemDetail.php?auctionID=<?PHP echo $row['id'] ?>">View the item</a>
                </li>
          </ul>
    </div>
     <?php }//end if
    }//end of loop?>
   </form>
</div> 

  <!-- <form name="watchlist" action="../includes/watchlist.php" method="get">
    <input type="hidden" name="item">
    <input type="hidden" name="auction">
    <input type="hidden" name="user_id">
   <!-- <select name="item">
    <select name="auction">
    <select name="user_id"> 
	<input type="submit" value="Add to Watchlist" >
     </form> -->


              

</body>
</html>