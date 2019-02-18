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

        $a=DB::table("rezulatis")
            ->select('homeTeamId' , DB::raw('count(fullTimeHome > fullTimeAway)/count(homeTeamId)*100 as total'))
            ->whereIn('homeTeamId', $homeTeamId)
            ->groupBy('homeTeamId')
            //->where("rezulatis.fullTimeHome",">","rezulatis.fullTimeAway")
        ->get();

        dd($a);
    }
}
