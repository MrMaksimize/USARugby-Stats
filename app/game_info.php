<?php
include_once './include_mini.php';


if (empty($game)) {
  $game_id = empty($game_id) ? $request->get('id') : $game_id;
  $game = $db->getGame($game_id);
}
$loader = new Twig_Loader_Filesystem(__DIR__.'/views');
$twig = new Twig_Environment($loader, array());
$comp = $db->getCompetition($game['comp_id']);
if (!empty($game['field_num'])) {
    $resource = $db->getResource($game['field_num']);
    $resource['loc_url'] = getResourceMapUrl($resource);
}
$settings = array('edit_check' => editCheck(), 'iframe' => $iframe);
$teams = array(
    'home' => $db->getTeam($game['home_id']),
    'away' => $db->getTeam($game['away_id']),
);
foreach ($teams as $key => $team) {
    $logo_url = empty($team['logo_url']) ? '' : $team['logo_url'];
    $teams[$key]['logo_url'] = getFullImageUrl($team['logo_url']);
}
echo $twig->render('game_info.twig', array('game' => $game, 'teams' => $teams, 'comp' => $comp, 'resource' => empty($resource) ? array() : $resource, 'settings' => $settings));
/*
echo compName($game['comp_id'], empty($iframe))."<br/>";
echo "Game Number: ".$game['comp_game_id']."<br/>";
echo teamName($game['away_id'], empty($iframe))." @ ".teamName($game['home_id'], empty($iframe))."<br/>";
echo date('F j, Y', strtotime($game['kickoff']))."<br/>";
echo "Kickoff: ".date('g:i', strtotime($game['kickoff']))."<br/>";
if (!empty($game['field_num'])) {
    $resource = $db->getResource($game['field_num']);
    $loc_url = getResourceMapUrl($resource);
    if (!empty($loc_url)) {
        echo "Field: ". $resource['title'] . " (<a href='$loc_url' target='_blank'>Map</a>)<br/>";
    }
    else {
        echo "Field: ". $resource['title'] . "<br/>";
    }
}


if (editCheck() && empty($iframe)) {
    echo "<input type='button' class='edit btn btn-primary' id='eShow' name='eShow' value='Edit Game Info' />";
    echo "<input type='hidden' id='game_id' value='$game_id' />";
}*/
