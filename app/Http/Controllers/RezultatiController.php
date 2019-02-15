<?php

namespace App\Http\Controllers;

use App\Classes\Football;
use App\Rezulati;
use Illuminate\Http\Request;

class RezultatiController extends Controller
{
    public function loadFinishResults()
    {
        $lige=new Football();
        $a=$lige->getFinishedMatches()->matches;

        foreach ($a as $match)
        {
            Rezulati::create(
                [
                    'competitionId'=>$match->competition->id,
                    'competitionName'=>$match->competition->name,
                    'homeTeamName'=>$match->homeTeam->name,
                    'awayTeamName'=>$match->awayTeam->name,
                    'homeTeamId'=>$match->homeTeam->id,
                    'awayTeamId'=>$match->awayTeam->id,
                    'utcDate'=>$match->utcDate,
                    'halfTimeHome'=>$match->score->halfTime->homeTeam,
                    'halfTimeAway'=>$match->score->halfTime->awayTeam,
                    'fullTimeHome'=>$match->score->fullTime->homeTeam,
                    'fullTimeAway'=>$match->score->fullTime->awayTeam,
                ]
            );
        }
    }
}
