<?php
include_once ('/home1/usarugb1/public_html/competition/include_mini.php');

if(!$roster_id){$roster_id=$_GET['id'];}

//get our team id and list of current rostered players
$query = "SELECT team_id,player_ids,comp_id FROM `event_rosters` WHERE id = $roster_id";
$result = mysql_query($query);
while ($row=mysql_fetch_assoc($result)){
$comp_id=$row['comp_id'];
$team_id=$row['team_id'];
$player_ids = $row['player_ids'];
}


//get the team's FSI ID to match against players Team FSI ID
$query = "SELECT fsi_id FROM `teams` WHERE id = $team_id";
$result = mysql_query($query);
while ($row=mysql_fetch_assoc($result)){
$fsi_id=$row['fsi_id'];
}

//Get the players that have a Team FSI ID that matches our team's FSI ID
$players = array();
$query = "SELECT id FROM `players` WHERE team_fsi_id = $fsi_id";
$result = mysql_query($query);
while ($row=mysql_fetch_assoc($result)){
$players[]=$row['id'];
}

//Get the roster limit from the comp info
$query = "SELECT max_event FROM `comps` WHERE id = $comp_id";
$result = mysql_query($query);
while ($row=mysql_fetch_assoc($result)){
$max_event = $row['max_event'];
}

$options = array();

echo "<form name='erform' id='erform' />\n";

//Use our player ID's to get their names: lastname, firstname
foreach ($players as $player){
$options[$player]=rplayerName($player);
}

//Get options into alphebetical order
asort($options);

//cplayers is an array to hold current player ids which is string seperated by -
$cplayers = array();
$cplayers = explode('-',substr($player_ids,1,(strlen($player_ids)-2)));

//Create select for each roster spot and provide an option for each player for team
for($j=1;$j<=$max_event;$j++){
echo "Player $j";
echo "<select id='p$j'>\n";
echo "<option value=''></option>\n";

$i=1;
foreach ($options as $option => $name){
if($option==$cplayers[$j-1]){$s='selected';}else{$s='';}
echo "<option value=\"$option\" $s>$name</option>\n";
$i++;
}

echo "</select><br/>\n";
}

echo "<input type='hidden' id='max' value='$max_event' />";
echo "<input type='hidden' id='roster_id' value='$roster_id' />";
echo "<input type='button' id='ersubmit' value='Update Roster' />";
echo "</form>\n";

?>