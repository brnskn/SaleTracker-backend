<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Plank\Metable\Metable;

class Distributor extends Model
{
    use SoftDeletes, Metable;
    protected $fillable = [
        'name', 'phone', 'address',
    ];
    public function users()
    {
        return $this->hasMany('App\DistributorUser');
    }
    public function missions()
    {
        return $this->hasMany('App\Mission');
    }
}
