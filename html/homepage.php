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

function submit_user_response($var1,$var2)
{
	$ID = $_SESSION['user_id'];
	$query = "INSERT INTO `userfeedback`(`id`,`date`,`feedback`) VALUES ($ID,\"$var1\",\"$var2\")";
	if(mysql_query($query)){
		echo "submitted";
	}
	else
	{
		echo "problem in submitting the data";
	}
}

if(is_user_set()){
	if(isset($_POST['date']) && !empty($_POST['date']))
	{
		if(isset($_POST['text']) && !empty($_POST['text']))
		{
			$date = mysql_real_escape_string($_POST['date']);
			$text = mysql_real_escape_string($_POST['text']);
			submit_user_response($date,$text);
		}

		
	}
}





?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="http://localhost/website/css/homepage.css" type="text/css"/>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="http://localhost/website/development_bundle_files/jquery-ui-1.11.4.custom/jquery-ui.css" type="text/css"/>
<link rel="stylesheet" href="http://localhost/website/development_bundle_files/jquery-ui-1.11.4.custom/jquery-ui.structure.css" type="text/css"/>
<link rel="stylesheet" href="http://localhost/website/development_bundle_files/jquery-ui-1.11.4.custom/jquery-ui.theme.css" type="text/css"/>

<title>
LEARN SKILLS 
</title>
</head>
<body>
<div id="header">
   <span id="forum">PLEASE TELL US ABOUT YOUR EXPERIENCE</span>
  <span id="show_username"><?php if(is_user_set()){echo getuserfield("user_name") ." "."<a href='http://localhost/website/php/logout.php/'>Logout</a>" ;}?></span>
</div>
<div id="form">
  <span id="hear">WE WOULD LOVE TO HERE FROM YOU :)</span>
  <hr>
  <form action="http://localhost/website/html/homepage.php/" method="POST">
    
     DATE:<input type="text" id="date" required name="date"/>
    <br> please write to us:<br>
    <textarea id="text" name="text" rows="10" cols="30" required></textarea>
    <input type="submit" id = "submit" value="Submit!"/>
    
  </form>
  </div>




<script type="text/javascript" src="http://localhost/website/development_bundle_files/jquery-3.0.0.js"></script>
<script type="text/javascript" src="http://localhost/website/development_bundle_files/jquery-ui-1.11.4.custom/external/jquery/jquery.js"></script>
<script type="text/javascript" src="http://localhost/website/development_bundle_files/jquery-ui-1.11.4.custom/jquery-ui.js"></script>
<script type="text/javascript">

$("#date").datepicker();
</script>

</body>
</html>



