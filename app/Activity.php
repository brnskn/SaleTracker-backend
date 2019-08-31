<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Plank\Metable\Metable;

class Activity extends Model
{
    use Metable;
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
