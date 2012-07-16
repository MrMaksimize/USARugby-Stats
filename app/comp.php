<?php
include_once ('/home1/usarugb1/public_html/competition/include.php');

$comp_id = $_GET['id'];

$query = "SELECT * FROM `comps` WHERE id = $comp_id";
$result = mysql_query($query);
while ($row=mysql_fetch_assoc($result)){
echo "<h1>{$row['name']}</h1>";
}

echo "<h2>Competition Info</h2>";
//Get the info for this comp
include_once ('/home1/usarugb1/public_html/competition/comp_info.php');
echo "<br/>";

echo "<h2>Teams</h2>";
echo "<div id='teams'>";
//Get the teams in this comp
include_once ('/home1/usarugb1/public_html/competition/comp_teams.php');
echo "</div>";

if (editCheck(1)){
echo "<div id='addteamdiv'>";
include_once ('/home1/usarugb1/public_html/competition/add_team.php');
echo "</div>";
}

echo "<h2>Games</h2>";
echo "<div id='games'>";
//Get the games in this comp
include_once ('/home1/usarugb1/public_html/competition/comp_games.php');
echo "</div>";

if (editCheck(1)){
echo "<div id='addgamediv'>";
include_once ('/home1/usarugb1/public_html/competition/add_game.php');
echo "</div>";
}

include_once ('/home1/usarugb1/public_html/competition/footer.php');
mysql_close();
?>