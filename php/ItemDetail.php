<?php require '../includes/connect.php';
//Check if user is logged in
session_start();
if(isset($_SESSION['UserID'])){
}else{
    header('Location:Login.php');
}
?>


<?php
//display item information

if(isset($_POST["item_id"])){
    $itemid = $connection->real_escape_string($_POST["item_id"]);
}else if(isset($_GET["item_id"])){
    $itemid = $connection->real_escape_string($_GET["item_id"]);
}

//Input new bid
$newbid=$_POST['new_bid'];
$userid=$_SESSION['UserID'];


//display items.
$message='';
$sql="SELECT * FROM item WHERE item_id='$itemid'";
$result=mysqli_query($connection, $sql);
        if($connection->error){
            $message= $connection->error;
        }else{
            $row=$result->fetch_assoc();
        }


//Input new bidu
if (isset($_POST['new_bid_submit'])){
    if($row['item_highest_bid']=''){
    $connection->query("INSERT INTO item (item_highest_bid,success_bidder_id) "
            . "VALUES($newbid,$userid)"
    . "WHERE item_id='$itemid'");
    
    }elseif($newbid<$row['item_selling_price']){
              echo "Bid has to be higher then the minimum bid!";
               }   
        
             if($newbid>$row['item_highest_bid']){ 
              $connection->query("UPDATE item SET item_highest_bid= '{$newbid}' "
              . "success_bidder_id='{$userid}'"
              . "WHERE item_id = $itemid ");
              echo"bid added";
                }else{
                 echo"Sorry! New bid has to be higher then the current highest bid.";
                 }
                 
    header("Location:ItemDetail.php?item_id=$itemid");
    
}



?>

<!DOCTYPE html>

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

<div class="container col-lg-6">
    <div class="card" id="item_details">
        <img "card-img-top" src="data:image/jpeg;base64,<?php echo base64_encode($row['item_image']); ?>"
                 style="width:300px;height:330px"/>
            <div class="card card-block" >
               <h4 class="card-title">
                        <?php echo $row['item_name'];?></h4>
                    <p class="card-text"> Description:<?php echo $row['item_description'];?><p>
                    <p> From £<?php echo $row['item_selling_price'];?> </p>
                    <p>Highest bid:£ <?php echo $row['item_highest_bid'];?></p>
                    <form action="ItemDetail.php" method="post">
                    <input type="hidden" name="item_id" value="<?php echo $row['item_id']?>">
                    <input type="text" name="new_bid">
                    <input type="submit" name="new_bid_submit" class="btn btn-default" vlue="Put a new bid">
                    </form>
              </div>
     </div>
</div>
    
    
    
    
</body>
</html>
