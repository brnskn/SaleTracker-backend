<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Plank\Metable\Metable;

class Mission extends Model
{
    use Metable;
    protected $casts = [
        'deadline' => 'datetime',
    ];
    public function unit()
    {
        return $this->belongsTo('App\Unit');
    }
    public function distributor()
    {
        return $this->belongsTo('App\Distributor');
    }
    public function user_missions()
    {
        return $this->hasMany('App\UserMission');
    }
}
