<!DOCTYPE html>
<?php

include 'DBConnect.php';

$ordering = "pname ASC";

if (isset($_GET['ordering']))
{ 
	if ($_GET['ordering'] == "dh")
    { $ordering = "difficulty DESC"; }
    else if ($_GET['ordering'] == "dl")
    { $ordering = "difficulty ASC"; } 
    else if ($_GET['ordering'] == "n")
    { $ordering = "pname ASC"; } 
}

$puzzlesQuery = "SELECT pname, plays, completions, url FROM Puzzles ORDER BY $ordering";

?>

<html>
<head>
  <meta charset="utf-8">
  <title>Puzzles List</title>
  <link rel="stylesheet" type="text/css" href="mainStyle.css">
</head>
<body>

<?php   
    if (isset($_GET['msg']))
    {
    	$msg = $_GET['msg'];
    	echo "<script>alert('$msg');</script>";
    }
?>

  <center><h2>Playable Puzzle Images:</h2>
  <hr/>
  	<?php include('_nav.php'); ?>
  <hr/><br/>
  <lable>
  	<p>Order By:</p> <a href = "puzzles.php?ordering=dh">Hardest</a> | 
    		  <a href = "puzzles.php?ordering=dl">Easiest</a> | 
              <a href = "puzzles.php?ordering=n">Name</a>
              <p></p>
  </lable>
  </center>
  
<?php    
    	if ($result = $dbcon->query($puzzlesQuery))
        {
        	if ($result->num_rows > 0)
            {
        		echo "<center><table>";
        
        		while ($row = $result->fetch_array())
            	{
                	echo "<tr>";
                    
                    echo "<td><img onLoad=\"snapfit.add(this);\" src='" . $row['url'] . 
                    	 "' alt = 'Puzzle Preview' width = '100px' height = '95px'></td>";
                    
					echo "<br/><td>&nbsp <a href='play.php?puzzle=" . $row['pname'] 
                       . "'>" . $row['pname'] . "</a><br/>";
                     
                    if ($row['completions'] == 0)
                    { 
                    	if ($row['plays'] == 0)
                        { echo "<br/><p>&nbsp Difficulty:<br/>&nbsp Unknown</p></td>"; }
                    
                    	$row['completions'] = 1;
                    }
                    else  
                    { 
                    	echo "<br/><p>&nbsp Difficulty: " . ($row['plays'] / $row['completions']) . "</p></td>";	
                    }
                       
                    echo "</tr>";
            	}
            
            	echo "</table></center>";
            
            	$result->free();
            }
            else
            { echo "<p>There seems to be no puzzles...... </p>"; }
        }
        else
        { echo "<p>Database Query Unsuccessful.</p>"; }
 
 		$dbcon->close();
?>
  <br/><br/><br/><br/>
</body>
</html>
