<?php include "connect.php";?>

<?php
//process the search query
if(isset($_POST['search']) && $_POST['search']!=""){
      }else{
      header("Location:login_success.php");
      }
/* Select auction items by All categories */  
   
      $sql="SELECT category_id FROM item_category WHERE item_category_description "
              . "LIKE '%".$_POST['search']."%'";
   
      $query=myspli_query($connection, $sql);
      
if(mysql_num_rows($query)!=0){ 
do{
    echo $search['']
    
}while(    
      $search=mysql_fetch_assoc($qeury));
}else{ 
    echo"no results found";
}
      

?>
      
      
<?php
//create an array of categories
$categories=['Clothing','Antiques', 'Electronics' ];