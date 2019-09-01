<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Plank\Metable\Metable;

class Mission extends Model
{
    use SoftDeletes, Metable;
    protected $fillable = [
        'name',
        'description',
        'goal',
        'award',
        'is_period',
        'period',
        'is_deadline',
        'deadline',
        'distributor_id',
        'unit_id',
    ];
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
