<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Plank\Metable\Metable;

class DistributorUser extends Model
{
    use SoftDeletes, Metable;
    protected $fillable = [
        'user_id', 'distributor_id',
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function distributor()
    {
        return $this->belongsTo('App\Distributor');
    }
}
