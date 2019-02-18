<?php

namespace App\Http\Controllers;

use App\Classes\Football;
use App\Rezulati;

/**
 * Class RezultatiController
 * @package App\Http\Controllers
 */
class RezultatiController extends Controller
{
    /**
     *Funkcija stornira sve rezultate utakmiya ya proteklih 10 dana
     * napraviti da kupi samo dan unazad jer ce biti svakodnevno azuriranje
     */
    public function loadFinishResults()
    {
        $lige=new Football();
        $a=$lige->getFinishedMatches()->matches;

        foreach ($a as $match)
        {
            Rezulati::firstOrCreate(
                [
                    'matchesId'=>$match->id,
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
