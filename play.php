<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Play</title>
  <link rel="stylesheet" type="text/css" href="mainStyle.css">
  <script src="snapfit.js"></script>
  <script src="timer.js"></script>
</head>
<body>
  <center><h3>Playing: <?php echo $_GET['puzzle']; ?></h3></center>
  <hr/>
  <center>
    <?php include('_nav.php'); ?>
  <hr/><br/><br/>

<?php

include 'DBConnect.php';
$pname = $_GET['puzzle'];
$puzzleurl;
$puzzleQuery = "SELECT url, pname FROM `Puzzles` WHERE pname = '" . $pname . "'";

// For checking if logged in, and validating the login info if so. 
include '_validate.php';

if ($isvalid == "true")
{
	// Get info from DB matching chosen puzzle.
	if ($result = $dbcon->query($puzzleQuery))
	{
		// If puzzle exists, get the URL for use.
		if ($result->num_rows > 0)
    	{
        	$row = $result->fetch_array();
			$puzzleurl = $row['url'];  
        	$result->free();
            
            echo "<a href = 'highScoreTable.php?puzzle=" . $row['pname'] . "'>View High Scores</a>";
           
        
        echo "<form action = '_addScore.php' action = 'POST' >
        		<input name = 'score' id = 'score' type = 'hidden' value='9999999'/>
                <input name = 'score' id = 'puzzle' type = 'hidden' value='" . $row['pname'] . "'/>
            	<br/>
            	<input class = 'button' type = 'submit' value = 'Finish Puzzle to Submit Score!'/>
        	  </form>";
        ?>
   	 	<!-- Begin game area -->
        <script>   
			var index = 0;
			var timerObj = new Timer();
			timerObj.Interval = 1000;
			timerObj.Tick = timer_tick;

			function timer_tick()
			{
				index  = index + 1;
				document.getElementById("time").innerHTML = index;
                document.getElementById("score").value = index;
			}
            
            function Reset()
            {
            	timerObj.Stop();
            	index  = 0;
				document.getElementById("time").innerHTML = index;
                document.getElementById("score").value = index;
            }
		</script> 
        <?php
        	echo "<br><br>";
    		echo "<div><img onLoad=\"snapfit.add(this);\" src='" . $row['url'] . 
                    	 "' alt = 'Puzzle' width = '800px' id=\"puzz\"></div>";
            echo "<br><br><div id = \"time\">0</div> Seconds><br><button class=\"button\" onclick=\"timerObj.Start()\">Start Timer</button> <button class=\"button\" onclick=\"timerObj.Stop()\">Stop Timer</button> <button class=\"button\" onclick=\"Reset()\">Reset Timer</button><p>";
			echo "Instructions:<br>Click and drag to solve the puzzle!<br>Backspace - Shuffle<br>Escape - Solve</p>";
            echo "<br><br>";
            echo "<img src='" . $row['url'] . 
                    	 "' alt = 'Puzzle' width = '500px'>";           
         ?>        
        <!-- End game area -->
		<?php
    	}
    	else
    	{ echo "<p>This puzzle could not be found. </p>"; }
	}
	else
	{ echo "<p>Database Query Unsuccessful.</p>"; }
}
else
{ echo "<p>You must be logged in to play.</p>"; }

$dbcon->close();
?>
</center> 
</body>
</html>
