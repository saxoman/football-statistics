<?php
/**
 * Created by PhpStorm.
 * User: sasa
 * Date: 15.2.19.
 * Time: 15.12
 */

namespace App\Classes;


use phpDocumentor\Reflection\Types\Self_;

/**
 * Class Football
 * @package App\Classes
 */
class Football
{
    /**
     * @var
     */
    protected $client;
    /**
     * @var mixed
     */
    protected $api_key;

    /**
     * Football constructor.
     */
    static $reqPrefs;

    /**
     * Football constructor.
     */
    public function __construct()
    {
       $this->api_key =env('FootballData_API_KEY');
        self::$reqPrefs['http']['method']='GET';
        self::$reqPrefs['http']['header'] = 'X-Auth-Token:'.$this->api_key;
    }

    /**
     * Funkcija vraca sve lige koje su doyvoljene trnutnim planom
     * @param array $filter
     * @return mixed
     */
    public function getLeagues(array $filter = ['areas' => ''])
    {
        $uri = 'http://api.football-data.org/v2/competitions?plan=TIER_ONE';
        $stream_context = stream_context_create(self::$reqPrefs);
        $response = file_get_contents($uri, false, $stream_context);
        return json_decode($response);
    }

    /**
     * Funkcija vraca reyultate odigranih meceva za 10 dana u nazad
     * @param array $filter
     * @return mixed
     */
    public function getFinishedMatches(array $filter = ['areas' => ''])
    {
        $uri = 'http://api.football-data.org/v2/matches?status=FINISHED&dateFrom='.date('Y-m-d', strtotime('-10 days')).'&dateTo='.date('Y-m-d').'';
        $stream_context = stream_context_create(self::$reqPrefs);
        $response = file_get_contents($uri, false, $stream_context);
        return json_decode($response);
    }
    public function getSheduledMatches(array $filter = ['areas' => ''])
    {
        $uri = 'http://api.football-data.org/v2/matches?dateFrom='.date('Y-m-d').'&dateTo='.date('Y-m-d', strtotime('+5 days')).'&status=SCHEDULED';
        $stream_context = stream_context_create(self::$reqPrefs);
        $response = file_get_contents($uri, false, $stream_context);
        return json_decode($response);
    }
}