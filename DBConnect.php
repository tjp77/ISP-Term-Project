<?php
$servername = "localhost";
$username = "isptermproj";
$password = "";
$dbcon = new mysqli($servername, $username, $password, "my_isptermproj");

if ($dbcon->connect_error)
{
	die("Connection to DB Failed. Error: " . $dbcon->connect_error); 
}
?>
