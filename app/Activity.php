<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Plank\Metable\Metable;

class Activity extends Model
{
    use SoftDeletes, Metable;
    protected $fillable = [
        'name', 'description', 'user_id',
    ];
    protected $with = ['meta', 'user'];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
