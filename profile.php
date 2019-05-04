<!DOCTYPE html>

<?php
include 'DBConnect.php';
$user = $_GET['profile']; 
?>

<html>
<head>
  <meta charset="utf-8">
  <title>Member Profile</title>
  <link rel="stylesheet" type="text/css" href="mainStyle.css">
</head>
<body>

  <center><h2><?php echo $user; ?></h2></center>
  <hr/>
  	<center>
    	<?php include('_nav.php'); ?>
    </center>
  <hr/>
  
<?php 
		$memberQuery = $dbcon->prepare("SELECT uid FROM Users WHERE uname = ?");
		$memberQuery->bind_param('s', $user);
		$memberQuery->execute();
        $result = $memberQuery->get_result();
    
    	if ($result->num_rows > 0)
        {
            $row = $result->fetch_array();
            $uid = $row['uid'];
            $result->free();

            $scoreQuery = $dbcon->query("SELECT score, level, pname
            							  FROM HighScores JOIN Puzzles
                                          ON HighScores.pid = Puzzles.pid
                                          WHERE HighScores.uid = $uid");
            
        	echo "<center><br/><br/><h3>Player's scores: </h3><br/>";
            
            while ($scoreResult = $scoreQuery->fetch_array())
            {
            	echo $scoreResult['pname'] . ": <b>" . $scoreResult['score'] . "</b>, on level <b>" 
                   . $scoreResult['level'] . "</b><br/><br/>";
            }
            
            $scoreQuery->free();
            
            $puzzleQuery = $dbcon->query("SELECT pname, difficulty
            							  FROM Puzzles
                                          WHERE uid = $uid");
            
            echo "<br/><h3>Puzzle images uploaded by this user:</h3><br/>";
      		
			while ($puzzleResult = $puzzleQuery->fetch_array())
            {
            	echo "<b>" . $puzzleResult['pname'] . "</b>, Difficulty: " 
                   . $puzzleResult['difficulty'] . "</b><br/><br/>";
            }
            
            echo "</center>";
            
            
        }
        else
        { echo "<p>Member seems not to exist......</p>"; }
 
 		$dbcon->close();
  
?>
  
</body>
</html>
