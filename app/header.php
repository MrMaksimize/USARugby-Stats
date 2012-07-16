<?php
include_once ('/home1/usarugb1/public_html/competition/include.php');
echo "<a href='/competition/'>Competitions</a> - ";
echo "<a href='/competition/help.php'>Help</a> - ";

//If the user has a team specific login, provide link to their roster page.
if($_SESSION['teamid'] > 0){
echo "<a href='/competition/team.php?id={$_SESSION['teamid']}'>My Rosters</a> - ";
}

//only display Admin Options to admins
if(editCheck(1)){
echo "<a href='/competition/admin.php'>Admin Options</a> - ";
}

echo "<a href='/competition/logout.php'>Logout</a>";
echo "<br/>";
?>