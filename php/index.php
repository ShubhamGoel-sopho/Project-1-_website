<?php



	ob_start();
	session_start();
	$filename = $_SERVER['SCRIPT_NAME'];
	$httprefer = $_SERVER['HTTP_REFERER'];




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



if(connect_to_database())
{
	if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
	{
		echo "you logged in already!!!<br>".getuserfield("name")." <br> <a href=\"http://localhost/website/php/logout.php \">LOGOUT</a> ";
		
	}
	else
	{
		if(isset($_POST['Email']) && isset($_POST['Password']))
		{
			$email= $_POST['Email'];
			$password = $_POST['Password'];
			
			if(!empty($email) && !empty($password))
			{
				
			
				
				$password_hash = md5($password);
				$sql = "SELECT `id` FROM `users` WHERE `email` = \"$email\" AND `password`= \"$password_hash\" ";
				if($query_run = mysql_query($sql))
				{
					$num = mysql_num_rows($query_run);
					if($num == 1)
					{
						$user_id = mysql_result($query_run,0,'id');
						$_SESSION['user_id'] = $user_id;
						echo '<script type="text/javascript"> window.location = "http://localhost/website/html/buildingwebsite.php/" </script>';
					}
					else
					{ 
						//try to use ajax
						echo "no such user exists or invalid password or username<br> or <a href=\"http://localhost/website/html/landing_page.html \">REGISTER</a>";
					}
				}
			}
			else
			{
				echo "fields can't be left empty ";
				
			}
		}
	}
}
else
{
	//for not connecting to the database
	echo "please try after sometime sorry for inconvinience";
}

?>











