<?php

namespace App\Http\Controllers\Games;

use App\Rezulati;
use App\Sheduled;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class KonacanIshodController extends Controller
{
    public function getKonacanIshod()
    {
        $homeTeamId=Sheduled::pluck('homeTeamId');
        //$awayTeamId=Sheduled::all('awayTeamId')->get()->toArray();
        $placeholders = implode(',',array_fill(0, count($homeTeamId), '?'));

        $a=DB::table("rezulatis")
            ->select('homeTeamId',
                DB::raw('count(*) as total'),
                DB::raw("SUM(CASE WHEN fullTimeHome > fullTimeAway THEN 1 ELSE 0 END) AS totalWinHome"),
                DB::raw("SUM(CASE WHEN fullTimeHome = fullTimeAway THEN 1 ELSE 0 END) AS totalWinAway"),
                DB::raw("SUM(CASE WHEN fullTimeHome < fullTimeAway THEN 1 ELSE 0 END) AS ukupno_nereseno"),
                DB::raw("SUM(CASE WHEN fullTimeHome + fullTimeAway > 3 THEN 1 ELSE 0 END) AS 3plus")
                )
            ->whereIn('homeTeamId', $homeTeamId)
            ->groupBy('homeTeamId')
            //->orderBy('homeTeamId',$homeTeamId)
            ->orderByRaw("field(homeTeamId,{$placeholders})", $homeTeamId)
            //->orderByRaw("FIND_IN_SET('homeTeamId','$placeholders')")
            //->whereRaw('fullTimeHome > fullTimeAway')
        ->get()->toArray();

        foreach ($a as $b){
            $b->procenat = ($b->totalWinHome / $b->total)*100;
        }


        dd($a,$homeTeamId,$placeholders);
    }
}
