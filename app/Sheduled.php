<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sheduled extends Model
{
    protected $fillable=['matchesId','competitionId','competitionName','homeTeamName','awayTeamName','homeTeamId',
        'awayTeamId','utcDate'
    ];

    public function setUtcDateAttribute($value)
    {
        $this->attributes['utcDate'] = date("Y-m-d H:i:s", strtotime($value));
    }
}
