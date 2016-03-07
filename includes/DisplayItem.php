<?php
require 'connect.php';
/* For login_success.php page*/
//Run a select query to get latest items 
$item_list='';
$sql=  mysqli_query("SELECT * FROM item LIMIT 9");

$itemCount=mysqli_num_rows($sql);//count the output amount
if($itemCount>0){
    while($row=mysql_fetch_array($sql)){
        $id=$row["item_id"];
        $name=$row["item_name"];
        $price=$row["item_selling_price"];
        $bid=$row["item_highest_bid"];
        $date_added=strftime("%b%d%T", strtotime($row["date_added"]));
        $dynamicList="Product id:$id-<strong>$name<stro ng>-$$price-"
                . "<em>Added $date_added</em>";
    }
}else{
        $dynamicList="We have no auction items yet";
}

 

?>