<?php

namespace App;

use Grambas\FootballData\FootballData;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Lige
 * @package App
 */
class Lige extends Model
{
    /**
     * @var
     */
    protected $primaryKey;
    /**
     * @var bool
     */
    public $incrementing =false;
    /**
     * @var string
     */
    protected $table='liges';
    /**
     * @var array
     */
    protected $fillable = ['idlige','naziv','code','emblemUrl'];
}
