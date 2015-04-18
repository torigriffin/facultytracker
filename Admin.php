<?php
session_start();
//Checks to see if the user is logged into the system
if (!isset($_SESSION['basic_is_logged_in']) 
    || $_SESSION['basic_is_logged_in'] !== true) {

	//Redirects the user to the login page
    ob_start();
    include("FLogin.php");
    ob_flush();
	exit;
	
}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="styles.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
-->
</style></head>
<body>

<table class="ds_box" cellpadding="0" cellspacing="0" id="ds_conclass" style="display: none;">
<tr><td id="ds_calclass">
</td></tr>
</table>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administrator | <?php echo $loginName; ?></title>
<link href="styles.css" rel="stylesheet" type="text/css" />
<body>
<div id='container'>
<div id="header">
<h1>Administrator</h1>
</div>
<div id='navigation'>
<p>
<h2>[<?php echo $loginName; ?>]<br /><br /><u>Navigation</u></h2></p>
<ul>
	<li><a href="admin/AdminHome.html" target='view'>| Home</a></li>
	<li><a href="admin/week.php" target='view'>| View Schedule</a></li>
    <?php if($_SESSION['lvl'] == 1){ echo "<li><a href='admin/tools.php' target='view'>| Tools </a></li>";} ?>
    <br /><br />
    <br /><br />
    <li><a href="logout.php" target='_top'>| Logout</a></li>
</ul>
</div>
<div id='content'>

  </center><iframe frameborder="0" name='view' width="900" height="700" src="admin/AdminHome.html"></iframe>
</h2>
</div>
<div class="footer">
<p><center>Brought to you by <b>”R.T.G.”</b> from Senior Project, Spring '15</center></p>
</div>
</body>
</html>