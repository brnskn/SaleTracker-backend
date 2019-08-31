<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Plank\Metable\Metable;

class Distributor extends Model
{
    use Metable;
    public function users()
    {
        return $this->hasMany('App\DistributorUser');
    }
    public function missions()
    {
        return $this->hasMany('App\Mission');
    }
}
