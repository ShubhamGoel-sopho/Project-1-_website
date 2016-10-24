<?php
ob_start();
session_start();



$_SESSION["user_id"] = 10;



echo "SELECT `name` FROM `users` WHERE `id` = ".$_SESSION["user_id"];



session_destroy();


?>