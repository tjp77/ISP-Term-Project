<!DOCTYPE html>
<html lang= "en">
<head>
	<meta charset="utf-8">
	<title>ISP Term Project - Fall 2018</title>
    <link rel = "stylesheet" href = 'http://isptermproj.altervista.org/mainStyle.css'/>
</head>
<body>

<?php   
    if (isset($_GET['msg']))
    {
    	$msg = $_GET['msg'];
    	echo "<script>alert('$msg');</script>";
    }
?>
	<center>
		<h2> Game Home Page </h2>
        <hr/>
   		<?php include('_nav.php'); ?>
        <hr/>
    	<br/>
        </center>
        <div style = "margin-left: 20%; margin-right: 20%">
        	<center><p><b>Welcome to the snapfit puzzle game site!</b></p></center>
            <br/>
			<p>
        		Here you can choose from one of a variety
                of images, which will then be transformed to a puzzle. To get started, register an
                account, and then head over to the "Puzzles List" to chose an image! If there's 
                nothing you like, you can even add a link to any image you want, and play that instead.
        	</p>
            <p>
            	The game is played using your mouse, allowing you to drag and drop puzzle pieces
                in order to re-create the selected image. When you start a puzzle, you will be 
                able to pick a challenge level to play the puzzle on. The higher the level, the more 
                puzzle pieces the image will be split into. Double clicking will rotate the puzzle 
                piece. To flip a puzzle piece vertically, double click and press either [shift] or
                the middle mouse button. To flip horizontally, double click while pressing either 
                [alt] or the right mouse button.  
            </p>
            <p>
            	Once you begin solving the puzzle, the time it takes you to complete it will
                be tracked, the final time being saved as your score for the puzzle. This score will
                be viewable both on the puzzle's high scores list, and on your own profile page. The 
                name of all puzzle images you add to the site will also be displayed on your profile. 
                Your profile, and the profiles of other players can be accessed through the members
                list, or directly from a puzzle's individual high scores list.
            </p>
        </div>
		<br/><br/>
</body>

<center>
<footer>
	<a href = "techDoc.php">[Technical documentation]</a> - 
    <a href = "https://docs.google.com/document/d/1Y6ATfUFOpuLqDjxRuX4TtJ89h2xdsurb_Nn04xhCc2Y/edit?usp=sharing">[Final Report]</a> - 
    <a href = "https://docs.google.com/presentation/d/1mHmwSObpuOiFZAx4tYA37I6_h1vny9M_Yz9L6N_W914/edit?usp=sharing">[PowerPoint Presentation]</a>
</footer>
</center>

</html>
