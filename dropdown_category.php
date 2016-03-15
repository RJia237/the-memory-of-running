<?php
if(isset($_POST['search'])&& $_POST['$categories'] && $_POST['search']!="")))
{
    
require "connect.php"; 

$categories=$_GET['categories'];

$sql="SELECT * FROM item INNER JOIN"
        . " item_category ON item.item_category_id=item_category.category_id "
        . "WHERE item_category.category_description like 'Clothing'";
$result=mysqli_query($connection,$sql);

$itemByCategory=array();

while ($row=mysqli_fetch_array($result)){
    array_push($categories, $row['item_name']);  
}
echo json_encode($itemByCategory);


}

mysqli_close($connection);
?>