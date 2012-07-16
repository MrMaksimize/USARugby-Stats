<?php
include_once ('./include.php');
$game_id = $_GET['id'];

echo "<h1>Game Info</h1>";

echo "<div id='info'>\r";
//Get the teams and kickoff and competition
include_once ('./game_info.php');
echo "</div>\r";


echo "<h2>Score</h2>";
echo "<div id='score'>\r";
//Get the rosters for this game
include_once ('./game_score.php');
echo "</div>\r";

echo "<h2>Rosters</h2> ";
//Get the rosters for this game
include_once ('./game_rosters.php');

echo "<h2>Scores</h2>\r";
echo "<div id='scores'>";
//Get the scoring events for this game
include_once ('./game_score_events.php');
echo "</div>";

//if we can edit/add, show the necessary form info
if (editCheck()){
echo "<div id='score_submit'>";
include ("./add_score.php");
echo "</div>";
}


echo "<h2>Subs</h2>";
echo "<div id='subs'>";
//Get the subs for this game
include_once ('./game_sub_events.php');
echo "</div>";

//if we can edit/add, show the necessary form info
if (editCheck()){
echo "<div id='sub_submit'>";
include ("./add_sub.php");
echo "</div>";
}

echo "<h2>Cards</h2>";
echo "<div id='cards'>";
//Get the yellow/red cards for this game
include_once ('./game_card_events.php');
echo "</div>";

//if we can edit/add, show the necessary form info
if (editCheck()){
echo "<div id='card_submit'>";
include ("./add_card.php");
echo "</div>";
}

if (editCheck()){
echo "<div id='signoff'>";
//Get the ref, coaches, and #4's signoffs
include_once ('./signatures.php');
echo "</div>";
}

include_once ('./footer.php');
mysql_close();
?>