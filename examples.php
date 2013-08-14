<?php
include_once("EverysportAPI.php");

/** Initialize EverysportAPI Client */
$es = new EverysportAPI("YOUR_API_KEY");

/**
 * Get events for a league
 */
$response = $es->listLeagueEvents(54258, array("limit" => 10));
echo print_r($response);

/**
 * Get events
 */
$response = $es->listEvents(array("limit" => 10));
echo print_r($response);


/**
 * Get standings for a league
 */
$response = $es->listLeagueStandings(54258, array("type" => "total"));
echo print_r($response);
