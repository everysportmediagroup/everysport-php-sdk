<?php
/**
 * PHP SDK to Everysport.com API
 *
 * Preconditions is a valid apikey and that cURL is installed.
 *
 * Created by Fredrik, 2013-02-25
 */
class EverysportAPI {

    /* Default endpoint using the latest version of everysport api. Using trailing slash. */
    //public static $ENDPOINT = "http://api.everysport.com/v1/";
    public static $ENDPOINT = "http://api-everysport.appspot.com/v0/";
    public static $DEBUG = false;

    private $apikey;


    public function __construct($apikey, $endpoint = null) {

        if(empty($apikey))
            throw new Exception("Please provide an apikey to .");

        $this->apikey = $apikey;

        if(!empty($endpoint))
            $this->endpoint = $endpoint;

    }

    public function doGETRequest($path, $params = array()) {

        /* Set all query params */
        $query = "";
        foreach($params as $key => $value) {
            $query = $query."&".$key."=".$value ;
        }

        $url = EverysportAPI::$ENDPOINT . $path . "?apikey=" . $this->apikey . $query;

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $resp = curl_exec($ch);
        curl_close($ch);

        return $resp;
    }

    /**
     * Get a list of events for specified league.
     *
     * @param $leagueId
     * @param array $params
     * @return response format according to everysport api documentation
     * @throws Exception
     */
    public function listEvents($leagueId, $params = array()) {

        if(empty($leagueId))
            throw new Exception("league id is required");

        $path = "leagues/".$leagueId."/events";

        return $this->doGETRequest($path, $params);
    }

    /**
     * Get current standing for specified league
     *
     * @param $leagueId
     * @param array $params
     * @return response format according to everysport api documentation
     * @throws Exception
     */
    public function listStandings($leagueId, $params = array()) {

        if(empty($leagueId))
            throw new Exception("league id is required");

        $path = "leagues/".$leagueId."/standings";

        return $this->doGETRequest($path, $params);
    }
}