<?php

namespace App\Http\Controllers;

use App\Classes\Football;
use App\Lige;
use Illuminate\Support\Facades\App;


class LigeController extends Controller
{
    public function loadLigeNames()
    {
        $lige=new Football();
        $a=$lige->getLeagues()->competitions;

       foreach ($a as $liga)
       {
           Lige::create(
               [
                   'idlige'=>$liga->id,
                   'naziv'=>$liga->name,
                   'code'=>$liga->code,
                   'emblemUrl'=>$liga->emblemUrl
               ]
           );
       }
    }
}
