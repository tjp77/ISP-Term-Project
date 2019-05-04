<?php

include 'DBConnect.php';

if ($_GET['logout'])
{
	setcookie('userid', "", time()-60*60*24*365, '/', 'isptermproj.altervista.org');
    setcookie('seskey', "", time()-60*60*24*365, '/', 'isptermproj.altervista.org');
    
    // Reset session key.
    $seskey = random_int(0, 99999);
    $updatequery = $dbcon->prepare("UPDATE Users 
            	   					SET sessionKey = ?  
                 				    WHERE uid = ?");
    $updatequery->bind_param('is', $sesskey, $_COOKIE['userid']);
    $updatequery->execute();
    
    header('Location: index.php');
}
else if (isset($_POST['username']) && isset($_POST['password']))
{
	$passw = $dbcon->real_escape_string($_POST['password']);
    $uname = $dbcon->real_escape_string($_POST['username']);
    
    $passhash = hash("sha256", $passw, false);
    
    $loginquery = $dbcon->prepare("SELECT uid, passwordHash 
    							   FROM Users 
   								   WHERE uname = ? AND passwordHash = ?");
                                   
    $loginquery->bind_param('ss', $uname, $passhash);
    $loginquery->execute();       
	$result = $loginquery->get_result();
    
    if ($result->num_rows > 0)
    {
    	$row = $result->fetch_array();
        $seskey = random_int(0, 99999);
        
    	setcookie('userid', $row['uid'], time()+60*60*24*365, '/', 'isptermproj.altervista.org');
        setcookie('seskey', $seskey, time()+60*60*24*365, '/', 'isptermproj.altervista.org');
    
    	// Set session key.
    	$dbcon->query("UPDATE `Users` 
            		   SET `sessionKey` = " . $seskey .  
            		  " WHERE uid = " . $row['uid']);
                      
    	header("Location: index.php");
    }
    else { header('Location: login.php?msg=invalid account info'); }
    
    $result->free();
    $dbcon->close();
}
