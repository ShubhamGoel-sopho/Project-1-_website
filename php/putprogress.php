<?php
	ob_start();
	session_start();
//	$filename = $_SERVER['SCRIPT_NAME'];
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
	$query = "SELECT `$arg` FROM `progress` WHERE `id` = ".$_SESSION["user_id"];
	if($query_run = mysql_query($query))
	{
		return mysql_result($query_run,0,$arg);
	}
	else
	{
		echo mysql_error();
	}
	
}
 

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

function updateprogress($value)
{
	$query = "UPDATE `progress` SET `value`= $value WHERE id = ".$_SESSION["user_id"];
	if(mysql_query($query))
	{
		return true;
	}
	else
	{
		return false;
	}
}




if(is_user_set()){
	if(isset($_POST['Value']) && !empty($_POST['Value']))
	{
		$x = updateprogress($_POST['Value']);
		if($x = true)
		{
			echo "WELL DONE !!!";
		}
		else
		{
			echo "Query unsuccessfull";
		}
	}
}
else
{
	echo "sorry";
}

?>
