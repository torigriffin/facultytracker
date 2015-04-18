<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login Page</title>
</head>

<link href="styles.css" rel="stylesheet" type="text/css" />

<body onload="goforit()">
<div id="container">
<div id="header"><h1><center>Faculty Login</center></h1></div>
<div id='navigation'>
<p><u><h2>Navigation</h2></u></p>
<ul>
	<li><a href="index.php">| Home </a></li>
</ul>
<br />
<br />
<br />
<br />
<br />
<br />
</div> 

<center>
<h2>Enter in your login information</h2>

<br />
<br />

<form action="faculty_login.php" method="POST"> 
  Username: <input type="text" 		name="username" size="15" />
  <br />  <br />
  Password: <input type="password" 	name="password" size="15" /> 
  <br />  <br />
    <p><input type="submit" value="Login" /></p> 
</form>

</center>

</body>
</html>