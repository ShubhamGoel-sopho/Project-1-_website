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

<link rel="stylesheet" href="http://localhost/website/css/buidingpage.css" type="text/css"/>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="http://localhost/website/development_bundle_files/jquery-ui-1.11.4.custom/jquery-ui.css" type="text/css"/>
<link rel="stylesheet" href="http://localhost/website/development_bundle_files/jquery-ui-1.11.4.custom/jquery-ui.structure.css" type="text/css"/>
<link rel="stylesheet" href="http://localhost/website/development_bundle_files/jquery-ui-1.11.4.custom/jquery-ui.theme.css" type="text/css"/>


<title>
LEARN SKILLS 
</title>
</head>
<body>
<span id='x'><</span>
<header id="head">

<h1>HI <?php if(is_user_set()){ echo strtoupper(getuserfield("name"))."<br>"."<h2>".getuserfield("email")."</h2>";}?></H1>
<H4>THANKS FOR VISTING HERE</H4>
<span id="arrow" title="click to get started">V</span>
</header>


<div id="main">
	<div id="navbarhead">
		<ul>
			<li><a href="http://localhost/website/html/homepage.php">Home </a></li>
			<li><a href="http://localhost/website/html/contact.php">Contact Me</a></li>
			<li><a href="http://localhost/website/html/forum.php">Forums</a> </li>    
		</ul>
	</div>
	<a href="#"><img src="http://localhost/website/images/menu-2-128.png" class="i" id="navimg"/></a>
	<span id="show_username"><?php echo getuserfield("user_name") ." "."<a href='http://localhost/website/php/logout.php/'>Logout</a>" ;?></span>
	<div id="progress_welcome"><H1>YOUR CURRENT PROGRESS IS :)</H1></div>
	<div id="progressbar"></div>
	<div id="progressshow"></div>
	
	
<div id="articlesection">
		<ul>
			 <li><a href="#intro">Introduction</A></LI>
			 <li><a href="#part1">Part 1</A></LI>
			 <li><a href="#part2">Part 2</A></LI>
			 </UL>
			 
		  <div id="intro">
		   <p>Git is a distributed revision control and source code management system with an emphasis on speed. Git was initially designed and developed by Linus Torvalds for Linux kernel development. Git is a free software distributed under the terms of the GNU General Public License version 2.
This tutorial explains how to use Git for project version control in a distributed environment while working on web-based and non-web-based applications development.</p>
		   <p>Version Control System (VCS) is a software that helps software developers to work together and maintain a complete history of their work.
<br>Listed below are the functions of a VCS:<br>
 <ul><li>Allows developers to work simultaneously.</li>
 <li>Does not allow overwriting each other’s changes.</li>
<li> Maintains a history of every version.</li></ul></p>
		   <p><h2>Advantages of git</h2><strong>Free and open source</strong><br><br>
Git is released under GPL’s open source license. It is available freely over the internet. You can use Git to manage propriety projects without paying a single penny. As it is an open source, you can download its source code and also perform changes according to your requirements.
<br><br><strong>Fast and small</strong><br><br>
As most of the operations are performed locally, it gives a huge benefit in terms of speed. Git does not rely on the central server; that is why, there is no need to interact with the remote server for every operation performed. The core part of Git is written in C, which avoids runtime overheads associated with other high-level languages. Though Git mirrors entire repository, the size of the data on the client side is small. This illustrates the efficiency of Git at compressing and storing data on the client side.
<br><br><strong>Implicit backup</strong><br><br>
The chances of losing data are very rare when there are multiple copies of it. Data present on any client side mirrors the repository, hence it can be used in the event of a crash or disk corruption</p>
		</div>
		 <div id="part1">
		   <p><h3> Local Repository</h3>
Every VCS tool provides a private workplace as a working copy. Developers make changes in their private workplace and after commit, these changes become a part of the repository. Git takes it one step further by providing them a private copy of the whole repository. Users can perform many operations with this repository such as add file, remove file, rename file, move file, commit changes, and many more</p>
			<p><h3>Working Directory and Staging  Area or Indexrea </h3>The working directory is the place where files are checked out. In other CVCS, developers generally make modifications and commit their changes directly to the repository. But Git uses a different strategy. Git doesn’t track each and every modified file. Whenever you do commit an operation, Git looks for the files present in the staging area. Only those files present in the staging area are considered for commit and not all the modified files.
Let us see the basic workflow of Git.<br>
Step 2: You add these files to the staging area.<br>
Step 1: You modify a file from the working directory.<br>
Step 3: You perform commit operation that moves the files from the staging area. After push operation, it stores the changes permanently to the Git repository.<br>
<br><img src="http://localhost/website/images/build.png" id="buildimg"/></p>
		   <p>Suppose you modified two files, namely “sort.c” and “search.c” and you want two different commits for each operation. You can add one file in the stagingarea and do commit. After the first commit, repeat the same procedure for
		   another file.<br><span style="font-family:Century Gothic;"># First commit<br>
[bash]$ git add sort.c<br>
# adds file to the staging area<br>
[bash]$ git commit –m “Added sort operation”<br>
# Second commit<br>
[bash]$ git add search.c<br>
# adds file to the staging area<br>
[bash]$ git commit –m “Added search operation”</span></p>
		  
		</div>	 
		 <div id="part2">
		   <p><h3>General workflow is as follows:</h3><br>
1. You clone the Git repository as a working copy.<br>
2. You modify the working copy by adding/editing files.<br>
3. If necessary, you also update the working copy by taking other developers' changes.<br>
4. You review the changes before commit.<br>
5. You commit changes. If everything is fine, then you push the changes to the repository.<br>
6. After committing, if you realize something is wrong, then you correct the last commit and push the changes to the repository.
Shown below is the pictorial representation of the workflow.</p>
		   <p><h3>initializing a empty repo</h3>Let us initialize a new repository by using init command followed by --bare option. It initializes the repository without a working directory. By convention, the bare repository must be named as .git.
<br><hr><span style="font-family:Century Gothic;">[gituser@CentOS ~]$ pwd
/home/gituser<br>
[gituser@CentOS ~]$ mkdir project.git<br>

[gituser@CentOS ~]$ cd project.git/<br>
[gituser@CentOS project.git]$ ls<br>
[gituser@CentOS project.git]$ git --bare init<br>
Initialized empty Git repository in /home/gituser-m/project.git/<br>
[gituser@CentOS project.git]$ ls<br>
branches config description HEAD hooks info objects refs</span></p>
		   <p><h3>Add files to repo then commit changes</h3>
		     <span style="font-family:Century Gothic;">[gituser@CentOS ~]$ git add "search.c"<br>
			 [gituser@CentOS ~]$ git commit -m "my first file repo";<br>
			 [gituser@CentOS ~]$ git status;<br>
		   </span>
		   </p>
		   

		</div>

		</div>


	
     <button id="button1">Click If Done</button>
	 <div id="feedback"></div>
	 <button id="button2">NEXT</button>
</div>








<script type="text/javascript" src="http://localhost/website/development_bundle_files/jquery-3.0.0.js"></script>
<script type="text/javascript" src="http://localhost/website/development_bundle_files/jquery-ui-1.11.4.custom/external/jquery/jquery.js"></script>
<script type="text/javascript" src="http://localhost/website/development_bundle_files/jquery-ui-1.11.4.custom/jquery-ui.js"></script>
<script type="text/javascript" src="http://localhost/website/javascript/buildingpage.js"></script>

</body>
</html>

