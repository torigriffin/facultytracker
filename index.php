<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="refresh" content="500" />
<title>PenPoint</title>
<link rel="shortcut icon" href="favicon.ico">
<link rel="icon" type="image/gif" href="animated_favicon1.gif">
<link href="styles.css" rel="stylesheet" type="text/css" />
</head>

<body onload="goforit()">
<style type="text/css">
table.weekly {
	border-width: 1px;
	border-spacing: 2px;
	border-style: solid;
	border-color: gold;
	border-collapse: collapse;
	background-color: rgb(213, 230, 242);
}
table.weekly th {
	border-width: 1px;
	padding: 1px;
	border-style: dotted;
	border-color: navy;
	background-color: #ffff7a;
	-moz-border-radius: 0px 0px 0px 0px;
} 
tr.days{
	background-color:#FFFF7A;
}
span.clock {font-size:12px; color:#00C;}
table.weekly td {
	border-width: 1px;
	padding: 1px;
	border-style: dashed;
	border-color: #ffff7a;
	background-color: white;
	-moz-border-radius: 0px 0px 0px 0px;
}
</style>
<div id="container">
<div id="header"><h1>Aggie PenPoint</h1></div>
<div id='navigation'>
<p><h2>Navigation</h2></p>

<ul>
<li><a href="FLogin.php">| Faculty Login </a></li>
<li><a href="StudentWeekly.php">| Weekly Schedule </a></li>
</ul>


</div>
 <div id='content'>
</div>
<h2><center>Welcome students of the Computer Science Department.</center></h2>
<h3><center><i> This is a Faculty / Staff Tracker to make sure you are able to find anyone in the department at anytime of the day.

</i></center></h3>
<br /><br />

<h3><center> Faculty at a Glance </center></h3>
 <center>
   <span id="clock"></span>
  
  <! Ends the function to show the current time>
 <?php

include('connect.php');

	//Creates the table to display our results of the query
	echo "<table class='weekly' width=600 border=2><tr><th> Faculty Name </th> <th> Current Location </th> </tr>";
	
	//Sets Current Time
	$current = time();
	$here = getdate();
	
	//The querty to get the staff names, events, locations, start and end times from the database
	//to check if the events are taking place right now
	$query1 = "SELECT staff.Name, event.Title, event.Location, event.Start, event.End, event.Ahoc
				FROM staff
				INNER JOIN event
				ON staff.staffID = event.staffID
				WHERE CURDATE() = event.Date
				AND CURTIME() BETWEEN event.Start AND event.End
				ORDER BY event.Ahoc desc";
				
	//All the results of the query is stored in this variable
	$result = mysql_query($query1);	
				
	//Have a query to get all the events that are going on now that are adhoc and not adhoc
	//Check to see if the staff member has an adhoc event going on
	//If he does then print out that result
	//If he doesnt then print out the regular event
		
	$oldStaffID = 0;
	
	//Goes through the results	
	while($row = mysql_fetch_array($result))
	{													
			echo "<tr>";
			//This puts the results in the table
			echo "<td align='center'>" . $row['Name'] . "</td>";
			if($row['Ahoc'] == 1)
			{
				echo "<td align='center'>" . "<b>[Override] </b>". $row['Title'] . " (". $row['Location'] . ")" . "</td>";
			}
			else
			{
				echo "<td align='center'>" . $row['Title'] . " (". $row['Location'] . ")" . "</td>";
			}
			echo "</tr>";
			
	}
	
	//Closes off the table
	echo "</table>";

?>
    
</center>
</p>
<script type="text/javascript"> 
/*
Live Date Script- 
Â© Dynamic Drive (www.dynamicdrive.com)
For full source code, installation instructions, 100's more DHTML scripts, and Terms Of Use,
visit http://www.dynamicdrive.com
*/
 
 
var dayarray=new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday")
var montharray=new Array("January","February","March","April","May","June","July","August","September","October","November","December")
 
function getthedate(){
var mydate=new Date()
var year=mydate.getYear()
if (year < 1000)
year+=1900
var day=mydate.getDay()
var month=mydate.getMonth()
var daym=mydate.getDate()
if (daym<10)
daym="0"+daym
var hours=mydate.getHours()
var minutes=mydate.getMinutes()
var seconds=mydate.getSeconds()
var dn="AM"
if (hours>=12)
dn="PM"
if (hours>12){
hours=hours-12
}
if (hours==0)
hours=12
if (minutes<=9)
minutes="0"+minutes
if (seconds<=9)
seconds="0"+seconds
//change font size here
var cdate="<small><font color='000000' face='Arial'><b>"+dayarray[day]+", "+montharray[month]+" "+daym+", "+year+" "+hours+":"+minutes+":"+seconds+" "+dn
+"</b></font></small>"
if (document.all)
document.all.clock.innerHTML=cdate
else if (document.getElementById)
document.getElementById("clock").innerHTML=cdate
else
document.write(cdate)
}
if (!document.all&&!document.getElementById)
getthedate()
function goforit(){
if (document.all||document.getElementById)
setInterval("getthedate()",1000)
}
 
</script> 
</p>
</div>
<div class="footer">
<p><center>Brought to you by <b>"R.T.G."</b> from Senior Project, Spring '15</center></p>
</div>
