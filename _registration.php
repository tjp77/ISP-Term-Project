<?php

include 'DBConnect.php';

$rusername = $dbcon->real_escape_string($_POST['rusername']);
$rpassword = $dbcon->real_escape_string($_POST['rpassword']);
$rpasswordconf = $dbcon->real_escape_string($_POST['rpasswordconf']);

if ($rpassword == $rpasswordconf)
{
	$acc_count = $dbcon->prepare("SELECT COUNT(uname) FROM Users WHERE uname = ?");
    $acc_count->bind_param('s', $rusername);
    $acc_count->execute();
    
    // If there is not already and existing account with chosen name..
	if ($accc_count == 0)
    {
    	$acc_count->close();
    	$passhash = hash("sha256", $rpassword, false);
		
		// Insert new user into database.
        $registeraccountq = $dbcon->prepare("INSERT INTO Users(uname, passwordHash) VALUES (?, ?)");
		$registeraccountq->bind_param('ss', $rusername, $passhash);
        $registeraccountq->execute();
        $registeraccountq->close();
        
        $newid = $dbcon->query("SELECT MAX(uid) AS newestid FROM Users");
        $row = $newid->fetch_array();
        
        $seskey = random_int(0, 99999);
        
        setcookie('userid', $row['newestid'], time()+60*60*24*365, '/', 'isptermproj.altervista.org');
        setcookie('seskey', $seskey, time()+60*60*24*365, '/', 'isptermproj.altervista.org'); 
        
        $dbcon->query("UPDATE `Users` 
            		   SET `sessionKey` = " . $seskey .  
            		  " WHERE uid = " . $row['newestid']);
        
        header('Location: index.php?msg=Registration Successful.');
    }
    else
    { header('Location: login.php?msg=Username already registered.'); }
    
    $result->free();
}
else
{
	// echo a js alert that they do not match
    header('location: login.php?msg=password fields not not match');    
}

$dbcon->close();

?>
