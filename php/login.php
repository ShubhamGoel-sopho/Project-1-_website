<?php

if(isset($_POST['email']) && isset($_POST['password']))
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	$password_hash = md5($password);
	if(!empty($username) && !empty($pasword))
	{
		$sql = "SELECT `id` FROM `users` WHERE `username` = \"$username\" AND `password`= \"$password_hash\" ";
		if($query_run = mysql_query($sql))
		{
			$num = $mysql_num_rows($query_run);
			if($num == 1)
			{
				$user_id = mysql_result($query_run,0,'id');
				$_SESSION['user_id'] = $user_id;
				header('Location:'.$httprefer);
				
			}
			else
			{
				echo "no such user exists or invalid password or username <br>";
				echo "<a href=\"register.php\">REGISTER</a>";
			}
			
		}
		
	}
	else
	{
		echo "fields can't be left empty ";
		
	}
}











?>

<form action="http://localhost/userloginregister/<?php echo $filename; ?>" method="POST">
Enter username:<br>
<input type="text" maxlength="30" name="username"></input>
<br><br>
password:<br>
<input type="password" name="password"></input>
<input type="submit" value="Log In"></input>
</form>