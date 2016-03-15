<?php
    //MySQLi
      $mysql_host='localhost';
      $mysql_user='root';
      $mysql_password='root';
      
      $connection = mysqli_connect($mysql_host,$mysql_user,$mysql_password, 'auction');
      
    //check connection
        if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
        }

