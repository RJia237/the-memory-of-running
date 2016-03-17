<?php 
require '../includes/connect.php';
//Check if user is logged in
session_start();
if(isset($_SESSION['UserID'])){
}else{
    header('Location:Login.php');
}
?>


<html>
<head>
  <title>Manage user account</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>


<body>

<nav class="navbar" id='cssmenu'>
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">OnlineAuction </a>
    </div>
    <ul class="nav navbar-nav pull-left">
      <li class="active"><a href='login_success.php'>Home</a></li>
      <li class="active"><a href='AddItem.php'>I want to sell</a></li>
    </ul>
    <ul class="nav navbar-nav pull-right">
         <li><a href="../php/Logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
</nav>

 


<div class="container" id="itemdisplay">
<?php

$yourauction="SELECT * FROM auction WHERE seller_id={$_SESSION['UserID']}";
$auctionitem=mysqli_query($connection, $yourauction);
        if($connection->error){
            echo "Database connection error";
        } ?>
    <h4>Your auction items<h4>
    <?php 
    $i=0;
    while ($row = mysqli_fetch_assoc($auctionitem)){
        if($i%3===0){?>
    <div class="row-fluid pull-left">
          <ul class="items">
                <li> <img src="data:image/jpeg;base64,<?php echo base64_encode($row['image']); ?>"
                 style="width:200px;height:230px"/>
                    <h4 class="h4">
                        <?php echo $row['name'];?></h4>
                    <p> Current highest bid:<?php echo $row['highest_bid'];?> </p>
                    <a class="btn btn-info" name='details' href="ItemDetail.php?userid=$userid&&item_id=<?php echo $row['id'];?>">Edit your item</a>
                </li>
          </ul>
    </div>
     <?php }//end if
    }//end of loop?>
</div>  
 
<div class="container" id="itemdisplay">
<?php

$yourbid="SELECT a.id, a.name,a.image,b.value FROM auction AS a,bid AS b
WHERE a.id=b.auction_id AND b.buyer_id={$_SESSION['UserID']}";

$biditem=mysqli_query($connection, $yourbid);
        if(!$biditem){
            echo $connection->error;
        } ?>
    <h4>Your Bids<h4>
    <?php 
    $i=0;
    while ($row = mysqli_fetch_assoc($biditem)){
        if($i%3===0){ ?>
    <div class="row-fluid pull-left">
          <ul class="items">
                <li> <img src="data:image/jpeg;base64,<?php echo base64_encode($row['image']); ?>"
                 style="width:200px;height:230px"/>
                    <h4 class="h4">
                        <?php echo $row['name'];?></h4>
                    <p> Your bid:<?php echo $row['value'];?> </p>
                    <a class="btn btn-info" name='details' href="ItemDetail.php?auctionID=<?php echo $row['id'];?>">Edit your item</a>
                </li>
          </ul>
    </div>
     <?php }//end if
    }//end of loop?>
</div>  


  
 </body>
</html>

