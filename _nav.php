  	

   <a href='http://isptermproj.altervista.org/index.php'>Main Page</a> &nbsp | &nbsp
   <a href='http://isptermproj.altervista.org/puzzles.php'>Puzzles List</a>&nbsp | &nbsp
   <a href='http://isptermproj.altervista.org/members.php'>Members List</a>&nbsp | &nbsp
   <a href='http://isptermproj.altervista.org/create.php'>Add A Puzzle Image</a>&nbsp | &nbsp
<?php

// Will also have to check if session key matches the current session key stored 
// int the DB for the user to ensure the login info is valid.
// That is not done here since whether or not someone can see the link to the
// log in page or not is not a security risk. But validity must be checked before letting
// scores be saved or letting that user do anything else related to the account itself. 
if(!(isset($_COOKIE['userid']) && isset($_COOKIE['seskey'])))
{
  ?> <a href = "login.php">Log In/Register</a> <?php
}
else
{
  ?> <a href='http://isptermproj.altervista.org/_login.php?logout=t'>Log Out</a> <?php
}
?>
