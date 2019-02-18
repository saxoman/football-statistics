<?php

namespace App\Http\Controllers;

use App\Classes\Football;
use App\Lige;


/**
 * Class LigeController
 * @package App\Http\Controllers
 */
class LigeController extends Controller
{
    /**
     * Funkcija stronira u bazu sve lige koje su trenutno dostupne
     */
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
