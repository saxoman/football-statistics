<?php
/**
 * Created by PhpStorm.
 * User: sasa
 * Date: 17.2.19.
 * Time: 22.19
 */

namespace App\Games;


use App\Sheduled;

class KonacanIshod
{
    public function ki1()
    {
        $ht=Sheduled::all('homeTeamId');
        dd($ht);
    }
}