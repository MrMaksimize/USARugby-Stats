<?php
include_once ('/home1/usarugb1/public_html/competition/include.php');
$game_id = $_GET['id'];

echo "<h1>Game Info</h1>";

echo "<div id='info'>\r";
//Get the teams and kickoff and competition
include_once ('/home1/usarugb1/public_html/competition/game_info.php');
echo "</div>\r";


echo "<h2>Score</h2>";
echo "<div id='score'>\r";
//Get the rosters for this game
include_once ('/home1/usarugb1/public_html/competition/game_score.php');
echo "</div>\r";

echo "<h2>Rosters</h2> ";
//Get the rosters for this game
include_once ('/home1/usarugb1/public_html/competition/game_rosters.php');

echo "<h2>Scores</h2>\r";
echo "<div id='scores'>";
//Get the scoring events for this game
include_once ('/home1/usarugb1/public_html/competition/game_score_events.php');
echo "</div>";

//if we can edit/add, show the necessary form info
if (editCheck()){
echo "<div id='score_submit'>";
include ("/home1/usarugb1/public_html/competition/add_score.php");
echo "</div>";
}


echo "<h2>Subs</h2>";
echo "<div id='subs'>";
//Get the subs for this game
include_once ('/home1/usarugb1/public_html/competition/game_sub_events.php');
echo "</div>";

//if we can edit/add, show the necessary form info
if (editCheck()){
echo "<div id='sub_submit'>";
include ("/home1/usarugb1/public_html/competition/add_sub.php");
echo "</div>";
}

echo "<h2>Cards</h2>";
echo "<div id='cards'>";
//Get the yellow/red cards for this game
include_once ('/home1/usarugb1/public_html/competition/game_card_events.php');
echo "</div>";

//if we can edit/add, show the necessary form info
if (editCheck()){
echo "<div id='card_submit'>";
include ("/home1/usarugb1/public_html/competition/add_card.php");
echo "</div>";
}

if (editCheck()){
echo "<div id='signoff'>";
//Get the ref, coaches, and #4's signoffs
include_once ('/home1/usarugb1/public_html/competition/signatures.php');
echo "</div>";
}

include_once ('/home1/usarugb1/public_html/competition/footer.php');
mysql_close();
?>