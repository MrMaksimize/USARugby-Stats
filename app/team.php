<?php
include_once ('/home1/usarugb1/public_html/competition/include.php');

$team_id = $_GET['id'];

$query = "SELECT name FROM `teams` WHERE id = $team_id";
$result = mysql_query($query);
while ($row=mysql_fetch_assoc($result)){
echo "<h1>{$row['name']}</h1>";
}

echo "<h2>Event Rosters</h2>";
//Get the rosters for this team
include_once ('/home1/usarugb1/public_html/competition/team_event_rosters.php');
echo "<br/>";

echo "<h2>Game Rosters</h2>";
//Get the rosters for this team
include_once ('/home1/usarugb1/public_html/competition/team_game_rosters.php');
echo "<br/>";

include_once ('/home1/usarugb1/public_html/competition/footer.php');
mysql_close();
?>