<?php
include 'DBConnect.php';
$puzzle = $_GET['puzzle']; 

if (isset($_GET['score']) && isset($_COOKIE['userid']))
{
	$score = $_GET['score']; 
	$level = 3; // Update if level system is ever completed.

	$idQuery = $dbcon->prepare("SELECT HighScores.pid FROM HighScores, Puzzles 
    							WHERE pname = ? AND HighScores.pid = Puzzles.pid");
    $idQuery->bind_param('s', $puzzle);
    
	if ($idQuery->execute())
    {
    	$idResult = $idQuery->get_result();
    	$idRow = $idResult->fetch_array();
    
    	$pid = $idRow['pid'];
    	$idResult->free();
        
    	$submitQuery = $dbcon->prepare("INSERT INTO HighScores(pid, uid, score, level) 
    									VALUES (?, ?, ?, ?)");
    	$submitQuery->bind_param('ssss', $pid, $_COOKIE['userid'], $score, $level);
		
        if(!$submitQuery->execute())
        { echo "<p> High score submission failed. </p>"; }
        
        header("Location: highScoreTable.php?puzzle=$puzzle&score=$score&level=$level");
	}
    else {echo "<p>id query bad</p>";}
}
else 
{ echo "<p>Score or login unset. </p>"; }
?>
