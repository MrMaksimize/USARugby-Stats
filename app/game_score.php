<?php
include_once ('/home1/usarugb1/public_html/competition/include_mini.php'); 

if(!$game_id){$game_id=$_GET['id'];}

//get score for the game with id in url
$query = "SELECT * FROM `games` WHERE id = $game_id";
$result = mysql_query($query);
while ($row=mysql_fetch_assoc($result)){
$home_id = $row['home_id'];
$away_id = $row['away_id'];
echo teamName($away_id)." - {$row['away_score']}<br/>";
echo teamName($home_id)." - {$row['home_score']}<br/>";
}
?>