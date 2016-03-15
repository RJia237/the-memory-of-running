<?php require '../includes/connect.php';
//Check if user is logged in
session_start();
if(isset($_SESSION['UserID'])){
}else{
    header('Location:Login.php');
}
?>

<?php 
     $userid=$_SESSION["UserID"];
     $result=$connection->query("SELECT * FROM user WHERE user_id=$userid");
     $row=$result->fetch_array(MYSQLI_BOTH);
     
     session_start();
     
     $_SESSION["Firstname"]=$row["user_firstname"];
     $_SESSION["Lastname"]=$row["user_lastname"];
     $_SESSION["Email"]=$row["user_email"];
     $_SESSION["Password"]=$row["user_password"];
     $_SESSION["Dob"]=$row["user_dob"];
?>

<?php
/* Update account*/
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
      <li class="active"><a href='login_success.php.php'>Home</a></li>
      <li class="active"><a href='AddItem.php'>I want to sell</a></li>
    </ul>
    <ul class="nav navbar-nav pull-right">
         <li><a href="../php/Logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
</nav>

<!--    
<div class="container">
<h2>Your Account</h2>
<div class="form-group" id='register'>
  <form method='post' action='' name='UpadateUserForm' >
    E-mail:
    <input type="email" name="user_email" value="<?php echo$_SESSION["Email"]?>"><br>
    User password:
    <input type="password" name="user_password" value="<?php echo$_SESSION["Password"]?>"><br>
    First Name:
    <input type='text' name='user_firstname' size='30' value="<?php echo$_SESSION["Firstname"]?>"><br>
    Last Name:
    <input type='text' name='user_lastname' size='30' value="<?php echo$_SESSION["Lastname"]?>"><br>
    Birthday:
  <input type="date" name="user_dob" value="<?php echo$_SESSION["dob"]?>">
    <p><input type='submit' name='update' value='Update account'></p>
 </form>
 </div>-->

<div class="container" id="itemdisplay">
<?php

$yourauction="SELECT * FROM item WHERE seller_id=$userid";
$auctionitem=mysqli_query($connection, $yourauction);
        if($connection->error){
            echo "Database connection error";
        }
?>
    <h4>Your auction items<h4>
    <?php 
    $i=0;
    while ($row = mysqli_fetch_assoc($auctionitem)){
        if($i%3===0){?>
    <div class="row-fluid pull-left">
          <ul class="items">
                <li> <img src="data:image/jpeg;base64,<?php echo base64_encode($row['item_image']); ?>"
                 style="width:200px;height:230px"/>
                    <h4 class="h4">
                        <?php echo $row['item_name'];?></h4>
                    <p> Current highest bid:<?php echo $row['item_highest_bid'];?> </p>
                    <a class="btn btn-info" name='details' href="EditItem.php?userid=$userid&&item_id=<?php echo $row['item_id'];?>">Edit your item</a>
                </li>
          </ul>
    </div>
     <?php }//end if
    }//end of loop?>
</div>  
 


  
 </body>
</html>

