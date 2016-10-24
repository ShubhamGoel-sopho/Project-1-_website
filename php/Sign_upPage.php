<?php

//for connecting to the database functionality//
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
//===========================================================================================//
//checking whether the user wxists in the database or not
function getuserexist($username)
{
	$sql = "SELECT `user_name` FROM `users` WHERE `user_name` = \"$username\"";
	if($query_run = mysql_query($sql))
	{
		if(mysql_num_rows($query_run) == 0)
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	else
	{
		echo mysql_error();
	}
}
//=================================================================================================================//
if(connect_to_database())
{
	if(isset($_POST['user_name']) && isset($_POST['name']) && isset($_POST['password']) && isset($_POST['email']))
    {
			$username =mysql_real_escape_string($_POST['user_name']);
			$name = mysql_real_escape_string($_POST['name']);
			$password = mysql_real_escape_string($_POST['password']);
			$email=mysql_real_escape_string($_POST['email']);
			if(!empty($username) && !empty($name) && !empty($password) && !empty($email))
			{
				if(strlen($username)> 50 || strlen($name)>50 || strlen($email)>60)
				{
						echo "please follow correct measures !!!<br>";
				}
				else
				{
						$chk = getuserexist($username);
						if($chk == true)
						{
							echo "same user with username as you already exists please try to get different username";
						}
						else
						{
							$password_hash = md5($password);
							$sqli = "INSERT INTO `users`(`id`, `name`, `user_name`, `email`, `password`, `time`) VALUES ('',\"$name\",\"$username\",\"$email\",\"$password_hash\",NOW())";
							$newid = "SELECT `id` FROM `users` WHERE `user_name` = \"$username\" ";
							
							
							if(mysql_query($sqli))
							{
								
								if($query_runagain = mysql_query($newid))
								{
									$REsult = mysql_result($query_runagain,0,'id');
									$createanother = "INSERT INTO `progress`(`id`,`value`) VALUES($REsult,0)";
									if(mysql_query($createanother))
									{
										echo "successfully registered with us :) :)",'<br>'," Please log in from the top left!!!";
										
									}
								}
							}
							else
							{
								echo "connection error please try after some time :( :(";
							}
						}
						
				}
					
		    }
		else
		{
			echo "fields can't be left empty<br>";
		}
    }
}	
else
{
	echo "connection error please try after some time :( :(";
}
	
	
	
	
	
	
	
	
	
	
?>

