<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Log In Page</title>
  <link rel = "stylesheet" href = "MainStyle.css">
  <link rel="stylesheet" type="text/css" href="mainStyle.css">
</head>

<style>
div.forms
{
    display: block;
    text-align: center;
}
form
{
   margin-left: 25%;
    margin-right:25%;
    width: 50%;
}
</style>

<body>

<?php   
    if (isset($_GET['msg']))
    {
    	$msg = $_GET['msg'];
    	echo "<script>alert('$msg');</script>";
    }
?>

	<center><h2>Welcome!</h2>
    <hr/>
    	<?php include('_nav.php'); ?>
    <hr/>
    <br/>
    </center>
    
	<div class = "forms">

	<p><strong>Log In To Your Account </strong></p>
	<form action="_login.php" method="post" name="login">
    <a>Username: </a><input name="username" type="text" /><br /> 
    <a>Password: </a><input name="password" type="password" /> <br />
    <input class="button" name="submit" type="submit" /></form>
    
	<br /><br /><br /> 

	<p><strong>Create A New Account</strong></p>
	<form action="_registration.php" method="post" name="register">
    <a>Username: </a><input name="rusername" type="text" /><br /> 
    <a>Password: </a><input name="rpassword" type="password" /><br /> 
    <a>Confirm Password: </a><input name="rpasswordconf" type="password" /><br /> 
    <input class="button" name="submit" type="submit" /></form>
    
    </div>
</body>
</html>
