<?php require "connect.php";?>
     
<?php

$categoryname = "SELECT category_description, category_id FROM item_category";
$cat_query = mysqli_query($categoryname);
$category = mysqli_fetch_assoc($query);
if (!$query = $connection->query($categoryname)) {
	die (' $connection->error');
}
?>

<?php
//search1: search by key words
if (isset($_GET['search'])&& !empty($_GET['search_content'])) {
	$content = mysqli_real_escape_string($connection, $_REQUEST['search_content']);     
	$sql = "SELECT * FROM item_category WHERE category_description LIKE '%".$content."%'"; 
	$c_query = mysqli_query($connection, $sql); 
	} 
          while($row=mysql_fetch_array($c_query)){ 
          $categoryname=$row['category_description']
	  $id=$connection->query("SELECT item_id FROM item WHERE"
        . " item.item_category_id=item_category.category_id ");
	  //-display the result of the array 
	  echo "<ul>\n"; 
	  echo "<li>" . "<a  href=\"login_success.php?id=$ID\">" "</a></li>\n"; 
	  echo "</ul>"; 
?>

<!-- 'search_content' is for the search field, 'categories' is for drop down
item_description is from items table. '$categorylist is concatinating the drop down with search box.  -->

<?php
//search by categories
if (!empty($_GET['search_content']) && !empty($_GET['categories'])) {
	$product = mysqli_real_escape_string($connection, $_GET['search_content']);
	$categorylist = mysqli_real_escape_string($connection, $_GET['categories']);
	$product_query = "SELECT * FROM item,item_category "
                . "WHERE item.category_id=item_category.category_id AND item_description LIKE '%".$product."%' AND item.category_id=".$categorylist;
	$result_product_query = mysqli_query($connection, $product_query);



}
elseif 	(!empty($_GET['categorylist'])) {
	// $product = mysqli_real_escape_string($connection, $_GET['search_content']);
	$categorylist = mysqli_real_escape_string($connection, $_GET['categories']);
	$product_query = "SELECT * FROM item,item_category "
                . "WHERE item.category_id=item_category.category_id "
                . "AND item.category_id=".$categorylist;

	// echo $product_query;
	$result_product_query = mysqli_query($connection, $product_query);
}

elseif (!empty($_GET['search_content'])) {
	$product = mysqli_real_escape_string($con, $_GET['search_content']);
	$product_query = "SELECT * FROM item,item_category "
                . "WHERE item.category_id=item_category.category_id"
                . " AND item_description LIKE '%".$product."%'";
	$result_product_query = mysqli_query($connection, $product_query);

    // echo $product_query;
}echo

	// echo $product_query;
	// $result_product_query = mysqli_query($con, $product_query);

if (mysqli_num_rows($result_product_query)==0 && isset($_GET["categories"]))
{
    // die('Invalid query: ' . mysqli_error($connection));
     echo "No items found in this category.";
}

?>
	
<?php while ($row = mysqli_fetch_assoc($result_product_query)) {
	
	echo $row["item_description"];
}; 




?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Search Item Category drop list</title>
    </head>
    <body>

 <form action='' method='GET'>
      <div class="row">
         <div class="col-xs-8 col-xs-offset-2">
		<div class="input-group">
                <div class="input-group-btn search-panel"> 
                   <button type="button" name='categories' class="btn btn-default dropdown-toggle" data-toggle="dropdown">	
                    <span>Categories</span><span class="caret"></span>
                    </button>
                   
                    <ul class="dropdown-menu" role="menu">
                         <?php while ($row=$query->fetch_assoc()) {?>
                        <li>
                       <?php echo $row["category_description"];?></li><br>
           <?php };//end of the while loop?>
                    </ul> 
                </div>
                <input type="hidden" name="search_param" value="all" id="search_param"> 
                <input type="text" class="form-control" name="search_content" placeholder="Search item...">
                <span class="input-group-btn">
               <button class="btn btn-default" name='search' type="button"><span class="glyphicon glyphicon-search"></span></button>
                </span>
            </div>
         </div>
      </div>
    </form>




    </body>
</html>
