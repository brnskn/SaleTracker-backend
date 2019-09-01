<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Plank\Metable\Metable;

class Unit extends Model
{
    use SoftDeletes, Metable;
    protected $fillable = [
        'name',
    ];
}
