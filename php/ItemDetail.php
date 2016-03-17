<?php require '../includes/connect.php';
//Check if user is logged in
session_start();
if(isset($_SESSION['UserID'])){
}else{
    header('Location:Login.php');
}

//Check User is allowed to bid

//Define some variables

if(isset($_POST['auctionID'])){
    //Make sure both POST and GET methods work
    $auctionID = $connection->real_escape_string($_POST['auctionID']);
}else if(isset($_GET['auctionID'])){
    $auctionID = $connection->real_escape_string($_GET['auctionID']);
}


$newbid=$_POST['new_bid'];
$userid=$_SESSION['UserID'];

/*******************
 * Close the auction and trigger actions when auction is expired
 *******************/
$expireauction="SELECT * FROM auction, bid"
              ."WHERE auction.id=$auctionID"
              ."AND auction.id=bid.auction_id"
              ."AND CURRENT_TIMESTAMP()= auction.end_date "
              ."AND winner IS NULL";
$endauction=$connection->query($expireauction);

if(mysqli_num_rows($endauction)>0){
    //award winner 
    header('Location: ../includes/EndAuction.php');
    
    
    
    
}else{

/***************************
 * display the auction details from the auction table
 ***************************/
 
$sql="SELECT * FROM auction WHERE id='$auctionID'";
$result=mysqli_query($connection, $sql);
        if($connection->error){
            $message= $connection->error;
        }else{
            
            $itemdetail=$result->fetch_assoc();
        }

 /*******************************
 *Buyers can see other buyers’ bids. 
 *******************************/
$result2=$connection->query("SELECT * FROM bid WHERE auction_id='$auctionID'"
                          . "ORDER BY value DESC");

        if($connection->error){
            echo $connection->error;
        }else{          
              $bid=$result2->fetch_array();
          }
}

 /****************************
  * Bidder can add bid
  ****************************/
 if(isset($_POST["new_bid_submit"])){
     $sql="INSERT INTO bid (auction_id,buyer_id, value) "
         . "VALUES($auctionID,$userid,$newbid)";
     $newbid=$connection->query($sql);
     //echo $sql;
     
     if(!$newbid){
     echo $connection->error;
     }else{
         header("Location:ManageAccount.php");
     }
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

<div class="container col-md-6"> 
      <div class="card" id="item_details">
        <img "card-img-top" src="data:image/jpeg;base64,<?php echo base64_encode($itemdetail['image']); ?>"
                 style="width:300px;height:330px"/>
            <div class="card card-block" >
               <h4 class="card-title">
                        <?php echo $itemdetail['name'];?></h4>
                    <p class="card-text"> Description:<?php echo $itemdetail['description'];?><p>
                    <p> From £<?php echo $itemdetail['starting_price'];?> </p>
                    <p>Auction close on:<?php echo $itemdetail['end_date'];?></p>
               <form action='' method='POST'>
                    <input type="hidden" name="auctionID" value="<?php echo $itemdetail['id']?>">
                    <input type="number" name="new_bid">
                    <input type="submit" name="new_bid_submit" class="btn btn-default" vlue="Put a new bid">
               </form>
            </div>
       </div>
</div>
    
 <div class="container col-md-6">
  <h2>Current bids</h2>          
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Bids £</th>
        <th>Bid added</th>
      </tr>
    </thead>
    <tbody>  
       <?php 
         // $i=0;
          while($bid=mysqli_fetch_array($result2)){ ?> 
        <tr>  
        <td><?php echo $bid['value'];?></td>
        <td><?php echo $bid['date'];?></td>
      </tr>
         <?php } ?>   
    </tbody>
  </table>
</div>

 
    

    
    
</body>
</html>