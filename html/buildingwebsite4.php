<?php
	ob_start();
	session_start();
	$filename = $_SERVER['SCRIPT_NAME'];
//	$httprefer = $_SERVER['HTTP_REFERER'];
	
	function connect_to_database(){
	if(!@mysql_connect('localhost','root','')||!@mysql_select_db('website'))
	{
		
		die(mysql_error());
		return false;
	}
	else
	{
		return true;
	}
}
function getuserfield($arg)
{
	$query = "SELECT `$arg` FROM `users` WHERE `id` = ".$_SESSION["user_id"];
	if($query_run = mysql_query($query))
	{
		return mysql_result($query_run,0,$arg);
	}
	else
	{
		echo mysql_error();
	}
	
}
  /*if(connect_to_database()){
		if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
		{
			echo "welcome:";
			echo "<br>";
			echo getuserfield("name")."<br>";
			echo getuserfield("email")."<br>";
			echo "<a href='http://localhost/website/php/logout.php/'>Logout</a>";
		}
		else
		{
			echo "please log in first you are trying to break the rules";
		}

  }
else
{
	//for not connecting to the database
	echo "please try after sometime sorry for inconvinience";
}*/

function is_user_set()
{
	if(connect_to_database()){
		if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
		{
			return true;
		}
		
		else
		{
			return false;
		}
	}
    else
	{
		//for not connecting to the database
		echo "please try after sometime sorry for inconvinience";
	}	
}



?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="http://localhost/website/css/buidingpage2.css" type="text/css"/>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="http://localhost/website/development_bundle_files/jquery-ui-1.11.4.custom/jquery-ui.css" type="text/css"/>
<link rel="stylesheet" href="http://localhost/website/development_bundle_files/jquery-ui-1.11.4.custom/jquery-ui.structure.css" type="text/css"/>
<link rel="stylesheet" href="http://localhost/website/development_bundle_files/jquery-ui-1.11.4.custom/jquery-ui.theme.css" type="text/css"/>


<title>
LEARN SKILLS 
</title>
</head>
<body>


<div id="main">
	<div id="navbarhead">
		<ul>
			<li><a href="http://localhost/website/html/homepage.php">Home </a></li>
			<li><a href="http://localhost/website/html/contact.php">Contact Me</a></li>
			<li><a href="http://localhost/website/html/forum.php">Forums</a> </li>    
		</ul>
	</div>
	<a href="#"><img src="http://localhost/website/images/menu-2-128.png" class="i" /></a>
	<span id="show_username"><?php if(is_user_set()){
		echo getuserfield("user_name")." "."<a href='http://localhost/website/php/logout.php/'>Logout</a>" ;
		} ?></span>
	<div id="progress_welcome"><H1>YOUR CURRENT PROGRESS IS :)</H1></div>
	<div id="progressbar"></div>
	<div id="progressshow"></div>
	
	<div id="articlesection">
		<ul>
			 <li><a href="#part9"> Part 9</A></LI>
			 <li><a href="#part10">Part 10</A></LI>
			 <li><a href="#part11">Part 11</A></LI>
		</ul>
	 
		<div id="part9">
			<p></p>
		</div>
		<div id="part10">
			<p>  </P>
			  			   
				 
		</div>
		<div id="part11">
			 <p></p>
		</div>
	</div>	
	
     <button id="button1">Click If Done</button>
	 <div id="feedback"></div>
	 <button id="button2">Finished-></button>
</div>








<script type="text/javascript" src="http://localhost/website/development_bundle_files/jquery-3.0.0.js"></script>
<script type="text/javascript" src="http://localhost/website/development_bundle_files/jquery-ui-1.11.4.custom/external/jquery/jquery.js"></script>
<script type="text/javascript" src="http://localhost/website/development_bundle_files/jquery-ui-1.11.4.custom/jquery-ui.js"></script>
<script type="text/javascript" src="http://localhost/website/javascript/buildingpage4.js"></script>

</body>
</html>

