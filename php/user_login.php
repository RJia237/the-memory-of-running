<?php
session_start();
if(!isset($_SESSION["user_sess"])){
    header("location:../index.php");
    }

<html>
<body>
Login Successful
</body>
</html>