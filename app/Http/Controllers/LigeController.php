<?php

namespace App\Http\Controllers;

use Grambas\FootballData\FootballData;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class LigeController extends Controller
{
    public function loadLigeNames()
    {
        $leagues=new FootballData(new Client());
        $a=$leagues->getLeagues();
        var_dump($a);
    }
}
