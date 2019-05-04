<?php

include 'DBConnect.php';

$puzzlename = $dbcon->real_escape_string($_POST['puzzlename']);
$puzzleurl = $dbcon->real_escape_string($_POST['puzzleurl']);

$puzzlequery = $dbcon->prepare("SELECT pname 
								FROM Puzzles 
                                WHERE pname = ? AND url = ?");
                                
$puzzlequery->bind_param('ss', $puzzlename, $puzzleurl);
$puzzlequery->execute();
$result = $puzzlequery->get_result();
$count = $result->num_rows;
$puzzlequery->close();

// Validate login info.
include '_validate.php'; 
$creatorid = $uidvalid;
    
// check if there is not already a puzzle with that name or url.
if ($isvalid = "true" && $count == 0)
{ 
    // Insert new puzzle into database.
    $creationquery = $dbcon->prepare("INSERT INTO Puzzles(pname, uid, url) VALUES (?, ?, ?)");
	$creationquery->bind_param('sss', $puzzlename, $creatorid, $puzzleurl);
    $creationquery->execute();
       
    header('Location: puzzles.php?msg=Puzzle Creation Successful.' . $creatorid);
}
else
{ header('Location: create.php?msg=Puzzle name or url already in use.'); }
    
$result->free();
$dbcon->close();

?>
