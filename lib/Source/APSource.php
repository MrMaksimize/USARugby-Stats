<?php

namespace Source;

use AllPlayers\Client;
use Monolog\Logger;
use Guzzle\Service\Inspector;
use Guzzle\Plugin\Oauth\OauthPlugin;
use Guzzle\Service\Resource\ResourceIteratorClassFactory;

class APSource extends Client {

    function __construct($base_url = 'https://www.pdup.allplayers.com', Logger $logger = null) {
        $attributes = $_SESSION['_sf2_attributes'];
        $oauth_config = array(
            'consumer_key' => $attributes['consumer_key'],
            'consumer_secret' => $attributes['consumer_secret'],
            'token' => $attributes['auth_token'],
            'token_secret' => $attributes['auth_secret']
        );
        parent::__construct($base_url, $logger, NULL, 'oauth', $oauth_config);
    }

    public function getGroupMembers($group_uuid) {
        $offset = 0;
        $members = array();
        do {
            $response = $this->groupsGetMembers($group_uuid, NULL, $offset, 10);
            $offset+=1;
            $members = array_merge($members, (array) $response);
        } while (sizeof($response) == 10);
        return $members;
    }

    public function getUserByUUID($uuid) {
        $command = $this->getCommand('GetUser', array('uuid' => $uuid));
        $user = $command->execute();
        return $user;
    }


    public function getGroupResources($group_uuid, $decode = TRUE) {
       $command = $this->getCommand('GetGroupResources', array('uuid' => $group_uuid));
       $command->execute();
       return empty($decode) ? $command->getResponse()->getBody() : json_decode($command->getResponse()->getBody());
    }

    public function createEvent($event_info) {
        $event = $this->eventsCreateEvent($event_info['groups'], $event_info['title'], $event_info['description'], $event_info['date_time'],
                $event_info['category'], $event_info['resources'], $event_info['competitors'], $event_info['published'], $event_info['external_id']);
        return $event;
    }

    public function updateEvent($uuid, $event_info) {
        $event = $this->eventsUpdateEvent($uuid, $event_info['groups'], $event_info['title'], $event_info['description'], $event_info['date_time'],
                $event_info['category'], $event_info['resources'], $event_info['competitors'], $event_info['published'], $event_info['external_id']);
        return $event;
    }

}