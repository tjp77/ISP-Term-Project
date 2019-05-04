<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Log In Page</title>
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

<script>
function addPreview()
{
	document.getElementById("preview").src = document.getElementsByName("puzzleurl")[0].value; 
}
</script>

<body>

<?php   
    if (isset($_GET['msg']))
    {
    	$msg = $_GET['msg'];
    	echo "<script>alert('$msg');</script>";
    }
?>

	<center><h2>Create A Puzzle</h2>
    <hr/>
    	<?php include('_nav.php'); ?>
    <hr/>
    <br/>
    </center>
    <?php
    
    if(isset($_COOKIE['userid']) && isset($_COOKIE['seskey']))
    {
    	?>
		<div class = "forms">

		<p><strong>Your Puzzle Info</strong></p>
    
		<form action="_create.php" method="POST" name="create">
    
    		<a>Puzzle Name: </a><input name="puzzlename" type="text"/>
        	<br/><br/>
    		<a>Puzzle URL: </a><input name="puzzleurl" type="text" onchange = "addPreview()"/>
        	<br/><br/>
          <input class = "button" name="submit" type="submit" />
    
    	</form>
    	</div>
    
    	<br/><br/><br/>
    	<div>   
    		<center>
        		<p>Image Preview:</p>
        		<br/> 
        		<img id = "preview" src = "" >
        	</center>
    	</div>
    
       	<?php
    }
    else
    { echo "<center>You must be logged in to create/add a puzzle image.</center>"; }
    
    ?>
    
</body>
</html>
