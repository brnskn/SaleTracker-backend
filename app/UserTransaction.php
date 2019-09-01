<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Plank\Metable\Metable;

class UserTransaction extends Model
{
    use Metable;
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
