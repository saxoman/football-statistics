<?php

namespace App\Http\Controllers;


use App\Classes\Football;
use App\Sheduled;

class SheduledController extends Controller
{
    public function loadSheduledResults()
    {
        $lige=new Football();
        $a=$lige->getSheduledMatches()->matches;

        foreach ($a as $match)
        {
            Sheduled::firstOrCreate(
                [
                    'matchesId'=>$match->id,
                    'competitionId'=>$match->competition->id,
                    'competitionName'=>$match->competition->name,
                    'homeTeamName'=>$match->homeTeam->name,
                    'awayTeamName'=>$match->awayTeam->name,
                    'homeTeamId'=>$match->homeTeam->id,
                    'awayTeamId'=>$match->awayTeam->id,
                    'utcDate'=>$match->utcDate
                ]
            );
        }
    }
}
