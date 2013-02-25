<?php
include_once("EverysportAPI.php");

/** Initialize EverysportAPI Client */
$es = new EverysportAPI("123abc");

/**
 * Get events for a league
 */

$response = $es->listEvents(54258, array("limit" => 10, "callback" => "myfunc"));
echo $response;


/**
 * Get standings for a league
 */
$response = $es->listStandings(54258, array("type" => "total", "callback" => "myfunc"));
echo $response;