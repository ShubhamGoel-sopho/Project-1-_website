<?php


    ob_start();
	session_start();
	$filename = $_SERVER['SCRIPT_NAME'];
	$httprefer = $_SERVER['HTTP_REFERER'];

session_destroy();
header('Location:http://localhost/website/html/loginpage.html');

?>