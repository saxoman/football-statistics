<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Rezulati
 * @package App
 */
class Rezulati extends Model
{
    /**
     * @var array
     */
    protected $fillable=['competitionId','competitionName','homeTeamName','awayTeamName','homeTeamId',
        'awayTeamId','utcDate','halfTimeHome','halfTimeAway','fullTimeHome','fullTimeAway'
        ];

    public function setUtcDateAttribute($value)
    {
        $this->attributes['utcDate'] = date("Y-m-d H:i:s", strtotime($value));
    }
}