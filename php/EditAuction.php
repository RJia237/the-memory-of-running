<?php


/* Update auction item details*/

     if(isset($_POST['update'])){
         
         $updatefn=$_POST['user_firstname'];
         $updateln=$_POST['user_lastname'];
         $updateps=$_POST['user_password'];
         $updateemail=$_POST['user_email'];
         $updatedob=$_POST['user_dob'];
                
         $sql=$con->query("UPDATE user SET user_firstname='{$updatefn}',"
         . "user_lastname='{$updateln}',user_email='{$updateemail}',"
         . "user_password='{$updateps}',user_dob='{$updatedob}'");
         
         header('Location:ManageAccount.php');
     }
?>


<html>
<head>
    <title>Seller edit auction item</title>
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
        </ul>
     <ul class="nav navbar-nav pull-right">
        <li><a href="Logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
     </ul>
</nav>
    
    


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
                    <p>Auction close on:<?php echo $row['item_close_date'];?></p>
                    <form action="ItemDetail.php" method="post">
                    <input type="hidden" name="item_id" value="<?php echo $row['item_id']?>">
                    <input type="text" name="new_bid">
                    <input type="submit" name="new_bid_submit" class="btn btn-default" vlue="Put a new bid">
                    </form>
              </div>
     </div>
</div>

    
