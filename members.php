<!DOCTYPE html>

<?php

include 'DBConnect.php';

$membersQuery = "SELECT uname FROM `Users` ORDER BY uname ASC";

?>

<html>
<head>
  <meta charset="utf-8">
  <title>Current Members</title>
  <link rel="stylesheet" type="text/css" href="mainStyle.css">
</head>
<body>

  <center><h2>Current Members</h2>
  <hr/>
    <?php include('_nav.php'); ?>
  <hr/>
  <br/>
  </center>
<?php 
    
    	if ($result = $dbcon->query($membersQuery))
        {
        	if ($result->num_rows > 0)
            {
        		echo "<center><table>";
        
        		while ($row = $result->fetch_array())
            	{
					echo "<br/><tr><td><a href='profile.php?profile=" . $row['uname'] 
                       . "'>" . $row['uname'] . "</a></td></tr>";			            
            	}
            
            	echo "</table><center>";
            
            	$result->free();
            }
            else
            { echo "<p>There seems to be no members......</p>"; }
        }
        else
        { echo "<p>Database Query Unsuccessful.</p>"; }
 
 		$dbcon->close();
  
?>
  
</body>
</html>
