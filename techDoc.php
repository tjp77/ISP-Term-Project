<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Technical Documentation</title>
    <link rel="stylesheet" type="text/css" href="mainStyle.css">
</head>
<body>
	<center>
		<h2>Technical Documentation</h2>
        <hr/>
   		<?php include('_nav.php'); ?>
        <hr/>
    	<br/>
        
        <div style = "margin-left: 20%; margin-right: 20%; font-family:verdana; font-size: 12px;">
        
       	<h2>Game design and architecture:</h2>
        <p>
        <br/>
        <br/>
        Game creation is done with the SnapFit JavaScript library, found here: <br/>
        http://www.netzgesta.de/snapfit/
        </p>
          <br/><br/><br/>
        <h2>Database Design:</h2>
        <p>
        <br/><br/>
			<u><b>Users Table:</b></u>
			<br/><br/>
		  	uid INT PRIMARY KEY AUTO_INCREMENT,<br/><br/>
			uname VARCHAR(15) NOT NULL UNIQUE, <br/><br/>
			passwordHash VARCHAR(100) NOT NULL, <br/><br/>
			sessionKey INT UNIQUE <br/><br/><br/>


			<u><b>Puzzles Table:</b></u>
			<br/><br/>
			pid INT PRIMARY KEY AUTO_INCREMENT,<br/><br/>
			pname VARCHAR(30) UNIQUE NOT NULL,<br/><br/>
            pname VARCHAR(300) UNIQUE NOT NULL,<br/><br/>
			completions INT NOT NULL,<br/><br/>
            plays INT NOT NULL,<br/><br/>
			difficulty INT NOT NULL DEFAULT 0,<br/><br/>
			FOREIGN KEY(uid) REFERENCES Users(uid) <br/>ON UPDATE CASCADE ON DELETE RESTRICT<br/><br/><br/>

			<u><b>HighScores Table:</b></u>
			<br/><br/>
			pid INT NOT NULL,<br/><br/>
			uid INT NOT NULL,<br/><br/>
			FOREIGN KEY(pid) REFERENCES Puzzles(pid) <br/>ON UPDATE CASCADE ON DELETE RESTRICT,<br/><br/>
			FOREIGN KEY(uid) REFERENCES Users(uid) <br/>ON UPDATE CASCADE ON DELETE RESTRICT,<br/><br/>
			score INT NOT NULL,<br/><br/>
            level INT NOT NULL,<br/><br/>
			PRIMARY KEY (pid, uid, level)<br/><br/>

        </p>
        <br/>
        <br/>
        <h2>Team and contributions:</h2>
        <p>
        <br/>
        <b>Tiffany:</b>
        <br/><br/>
			•	Database setup/management <br/>                                                                                                                                                       
			•	Site structure/file ordering   <br/>                                                                                                                                    
			•	PHP, SQL Components <br/>
            •	HTML display of data requiring DB access ie: puzzles list, scores <br/>                                                                                 
			•	Site navigation bar       <br/>                                                                                                                                              
			•	User account, registration, and login session system<br/>
            •	Data collection from client side and submision to DB<br/>
			•	User input submission response alerts <br/>
			•	Online help/info page <br/>
            •	Final report <br/>
			•	DB technical documentation page section <br/>
            •	Presentation slides
		<br/><br/>
		<b>Kyle:</b>
		<br/><br/>
        	•	Creation/implementation of the puzzle game itself<br/>
            •	Idea for project<br/>
            •	Score timer<br/>
            •	Relevant first project report section
		<br/><br/><br/>
		<b>Jesse:</b>
        <br/><br/>
			•	Non-DB information display/formatting CSS site styling <br/>
            •	Idea of puzzles for project<br/>
            •	Relevant first project report section<br/>
            •	Score timer<br/>
            •	Presentation slides
		<br/><br/>
        </p>
        	<br/><br/><br/><br/><br/>
        </div>
	</center>
</body>
</html>
