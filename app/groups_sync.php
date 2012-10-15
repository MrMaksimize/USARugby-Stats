<?php
header('Location: ' . $_SERVER['HTTP_REFERER']);
include_once './include.php';
use Source\APSource;

if (editCheck(1)) {
    $existing_teams = $db->getAllTeams();
    $attributes = $_SESSION['_sf2_attributes'];
    $client = new APSource;
    $teams = array();
    $offset = 0;
    do {
        $response = $client->userGetMyGroups($attributes['user_uuid'], NULL, $offset, 10);
        $offset+= 1;
        $teams = array_merge($teams, (array)$response);
    } while (sizeof($response) == 10);
    foreach ($teams as $team) {
        if (isset($team->uuid)) {
	        if (!$existing_teams || !key_exists($team->uuid, $existing_teams)) {
                if (!empty($team['logo'])) {
                    $logo_url = substr($team->logo, strpos($team->logo, '/sites/default/'));
                }
                else {
                    $logo_url = '/sites/default/files/imagecache/img_120x120_s/sites/all/modules/apci_features/apci_defaults/group-icon.png';
                }
	            $team_info = array(
	                'hidden' => 0,
	                'user_create' => $_SESSION['user'],
	                'uuid' => $team->uuid,
	                'name' => $team->title,
	                'short' => $team->title,
                    'logo_url' => $logo_url
	            );
	            $db->addTeam($team_info);
	            $existing_teams = $db->getAllTeams();
	            $added++;
	        }
        }
    }

    $_SESSION['alert_message'] = $added . " groups added.";
}
