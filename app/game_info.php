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
