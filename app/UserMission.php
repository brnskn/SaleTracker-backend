<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Plank\Metable\Metable;

class UserMission extends Model
{
    use SoftDeletes, Metable;
    protected $fillable = [
        'status',
        'user_id',
        'mission_id',
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function mission()
    {
        return $this->belongsTo('App\Mission');
    }
}
