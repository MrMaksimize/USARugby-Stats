<?php
include_once ('/home1/usarugb1/public_html/competition/include_mini.php');

if(!$roster_id){$roster_id=$_GET['id'];}

$query = "SELECT * FROM `event_rosters` WHERE id = $roster_id";
$result = mysql_query($query);
while ($row=mysql_fetch_assoc($result)){

$outputs = array();

$players = explode('-',$row['player_ids']);

foreach ($players as $player){
if ($player != '-' && $player != ''){
$outputs[$player]=rplayerName($player);
}
}
asort($outputs);

$i=1;
foreach ($outputs as $output => $name){
echo "$name<br/>\n";
$i++;
}

}
?>