<?php
require "../includes/connect.php";
/*Bid*/

//Check User is allowed to bid




 /****************************
  * Bidder can add bid
  ****************************/
 if(isset($_GET["new_bid_submit"])){
     $sql="INSERT INTO bid (auction_id, buyer_id, value) "
         . "VALUES($auctionID,$userid,$newbid)"
         . "WHERE auction_id=$auctionID";
     $connection->query($sql);
     echo $sql;
     
     if($connection->error){
     echo $connection->error;
     }else{
         header("Location:yourbid.php");

 }
 }
 
 
 

 /**************************
  * Define the highest bid
  **************************/
    $result3=$connection->query( "SELECT end_date, MAX(value) "
                                  . "FROM auction, bid "
                                  . "WHERE auction.id =$auctionidID "
                                  . "AND auction.id = bid.auction_id");
 
          if($connection->error){
                echo $connection->error;
             }else{    
          $DateAndBid=$connection->fetch_assoc($result3);
            }

            $highestbid=$DateAndBid['end_date'];
}
 
 
 

?>