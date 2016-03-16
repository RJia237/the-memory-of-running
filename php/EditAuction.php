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

    
