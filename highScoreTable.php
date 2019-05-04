<!DOCTYPE html>

<?php
include 'DBConnect.php';
$puzzle = $_GET['puzzle']; 
?>

<html>
<head>
  <meta charset="utf-8">
  <title>High Scores</title>
  <link rel="stylesheet" type="text/css" href="mainStyle.css">
</head>
<body>

  <center><h2>High Scores For: <?php echo $puzzle; ?></h2></center>
  <hr/>
  	<center>
    	<?php include('_nav.php'); ?>
    </center>
  <hr/>
  
<?php 
		$memberQuery = $dbcon->prepare("SELECT uname, score, level 
        								FROM Puzzles, Users JOIN HighScores ON Users.uid = HighScores.uid
                                        WHERE pname = ? AND Puzzles.pid = HighScores.pid
                                        ORDER BY level DESC, score ASC;");
                                        
		$memberQuery->bind_param('s', $puzzle);
		$memberQuery->execute();
        $result = $memberQuery->get_result();
    
    	if ($result->num_rows > 0)
        {            
        	echo "<center><br/><br/><br/>";
            
            while ($row = $result->fetch_array())
            {
            	echo $row['uname'] . ": <b>" . $row['score'] . "</b>, on level <b>" 
                   . $row['level'] . "</b><br/><br/>";
            }
            
            $result->free();
            
            echo "</center>";            
        }
        else
        { echo "<p>There are currently no scores for this puzzle.</p>"; }
 
 		$dbcon->close();
  
?>
  
</body>
</html>
