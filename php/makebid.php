<?php
require "../includes/connect.php";


$NOW = time();
$id = intval($_REQUEST['item_id']);
$bid = $_POST['bid'];
$bidder_id = $user->$_SESSION['UserID'];
$bidding_ended = false;

//check user login
session_start();
if(!isset($_SESSION['UserID'])){
    $_SESSION['REDIRECT_AFTER_LOGIN'] = 'ItemDetail.php?id=' . $id;
	header('location: user_login.php');
	exit;
}

// Update bids table


//check for highest bid