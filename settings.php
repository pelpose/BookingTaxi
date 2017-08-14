<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Lab 7 - MySQL Databases with PHP</title>
</head>

<body>
<?php

	$host = "HOST";
	$user = "USERNAME";
	$pswd = "PASSWORD";
	$dbnm = "DB";
		
		// Connect to mysql server
	$conn = @mysqli_connect($host, $user, $pswd)
	or die('Failed to connect to server');
	
	// Use database
	@mysqli_select_db($conn, $dbnm)
	or die('Database not available');
?>
</body>
</html>