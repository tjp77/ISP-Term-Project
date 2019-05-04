<?php
// Code to validate log in info in cookies to make sure it's legit and not falsified. 

$isvalid = "false";
$uidvalid;
$unamevalid;

if (isset($_COOKIE['userid']) && isset($_COOKIE['seskey']))
{
	$validationquery = $dbcon->prepare("SELECT uid, uname 
    									FROM Users 
                                        WHERE uid = ? AND sessionKey = ?");
                            
    $validationquery->bind_param('ss', $_COOKIE['userid'], $_COOKIE['seskey']);
    $validationquery->execute();
    $result = $validationquery->get_result();
	$matches = $result->num_rows;

	if($matches == 1)
    {
    	$row = $result->fetch_array();
        $uidvalid = $row['uid'];
        $unamevalid = $row['uname'];
        $isvalid = "true";
    }
    
    $result->free();
}

?>
