<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Plank\Metable\Metable;

class UserMission extends Model
{
    use Metable;
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function mission()
    {
        return $this->belongsTo('App\Mission');
    }
}
