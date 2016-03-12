<?php

require 'connect.php';

session_start();
unset($_SESSION['UserID']);
session_destroy();
echo 'You have logged out.'


?>

