<?php
session_start();
include('connect.php');

//This gets the information that is entered in the Faculty Login.html page and stores it into variables
$username = strtolower($_POST['username']);
$password = strtolower($_POST['password']);

//Attempt to prevent mysql injection
mysql_real_escape_string($username);
mysql_real_escape_string($password);

//Code to connect to the database
$con = mysql_connect($hostname, $dbusername, $dbpassword);
	
if (!$con)
{
	die('Unable to connect to MySQL' . mysql_error());
}
else
{
	
	//This selects the database	
	$selected_db = mysql_select_db($databaseName, $con);
	
	//Sample Query that get the username from the staffID that matches the username that is inputted
	$query = "SELECT * FROM staff WHERE username='$username'";
	
	//All the results of the query is stored in this variable
	$result = mysql_query($query);

	//This gets the information from result and puts it into an array
	$row = mysql_fetch_array($result);
	
	

	//This validates the username and password to make sure it is in the database
	if (isset($username) && isset($password))
	{
		
		if ($username == $row['username'] & ($password == $row['password'] or md5($password) == $row['password']))
			{
			//If login was correct
		
			//Sets session to true
			$_SESSION['basic_is_logged_in'] = true;
			$_SESSION['staffID'] = $row['staffID'];
			$_SESSION['name'] = $row['name'];
			$_SESSION['lvl'] = $row['level'];
			
			$loginName = $_SESSION['name'];
		
			//Redirects to this page
			ob_start();
        	include("admin/Admin.php");
			ob_flush();
			exit;
			}
		else
		{
		
		//Will show 2 links to link back to the home page and login page
		include("menu.php");
		echo "Wrong username or password";
		
		}//Ends 2nd if statement		

	}//Ends 1st if statement
	}
//Closes the connection
mysql_close($con);
?>