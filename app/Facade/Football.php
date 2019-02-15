<?php
/**
 * Created by PhpStorm.
 * User: sasa
 * Date: 15.2.19.
 * Time: 15.18
 */

namespace App\Facade;


use Illuminate\Support\Facades\Facade;

class Football extends Facade
{
    protected static function getFacadeAccessor() { return 'football'; }
}