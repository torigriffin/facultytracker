<?php
//Variables for Username, Password, Hostname

//Code for Our Server
$dbusername = 'c2facultytracker@facultytracker.ncat.edu’;
$dbpassword = '2015fTracker$';

//Variables for my local database on localhost
$hostname = 'facultytracker.ncat.edu';
$databaseName = 'c2facultytracker';

//Code to connect to the database
$con = mysql_connect($hostname, $dbusername, $dbpassword);
	
//If it couldnt connect to the database, the error message will tell us why	
if (!$con)
{
	die('Unable to connect to MySQL' . mysql_error());
}

else
{
	//This selects the database	
	$selected_db = mysql_select_db($databaseName, $con);
}

?>
