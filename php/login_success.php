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
                        <option value="<?php echo $category["category_id"]; ?>">
                       <?php echo $category["category_description"];?></option>
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
//display items.
$allitems="SELECT * FROM item";
$result_item_query=mysqli_query($connection, $allitems);
        if($connection->error){
            echo "Database connection error";
        }    

if (isset($_GET['search'])&& !empty($_GET['item']) && !empty($_GET['categorylist'])) {
	$product = mysqli_real_escape_string($connection, $_GET['item']);
	$categorylist = mysqli_real_escape_string($connection, $_GET['categorylist']);
	$product_query = "SELECT * FROM item,item_category "
                        . "WHERE item.item_category_id=item_category.category_id "
                        . "AND item.item_name LIKE '%".$product."%' "
                        . "AND item.item_category_id=".$categorylist;
        
	$result_item_query = mysqli_query($connection, $product_query);     
        
}elseif(isset($_GET['search'])&& !empty($_GET['categorylist'])) {
	// $product = mysqli_real_escape_string($connection, $_GET['item']);
	$categorylist = mysqli_real_escape_string($connection, $_GET['categorylist']);
	$product_query ="SELECT * FROM item,item_category "
                        . "WHERE item.item_category_id=item_category.category_id "
                        . "AND item.item_category_id=".$categorylist;
	$result_item_query = mysqli_query($connection, $product_query);
       
}elseif(isset($_GET['search'])&& !empty($_GET['item'])) {
	$product = mysqli_real_escape_string($connection, $_GET['item']);
	//$categorylist = mysqli_real_escape_string($con, $_GET['categorylist']);
	$product_query = "SELECT * FROM item,item_category "
                       . "WHERE item.item_category_id=item_category.category_id "
                       . "AND item.item_name LIKE '%".$product."%'";
	$result_item_query = mysqli_query($connection, $product_query); 
        
}elseif(isset($_GET['search'])&& empty($_GET['item']) && empty($_GET['categorylist']))
{
     $result_item_query = mysqli_query($connection, $allitems);
   
}       
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
?>        
        

    
<!--product display-->  

<div class="container" id="itemdisplay">
    <?php 
    $i=0;
    while ($row = mysqli_fetch_assoc($result_item_query)){
        if($i%3===0){?>
    <div class="row-fluid pull-left">
          <ul class="items">
                <li> <img src="data:image/jpeg;base64,<?php echo base64_encode($row['item_image']); ?>"
                 style="width:200px;height:230px"/>
                    <h4 class="h4">
                        <?php echo $row['item_name'];?></h4>
                    <p> From £<?php echo $row['item_selling_price'];?> </p>
                    <a class="btn btn-info" name='details' href="ItemDetail.php?item_id=<?php echo $row['item_id'];?>">View the item</a>
                </li>
          </ul>
    </div>
     <?php }//end if
    }//end of loop?>
</div>  







</form>

              

</body>
</html>