<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Plank\Metable\Metable;

class Attribute extends Model
{
    use SoftDeletes, Metable;
    protected $fillable = [
        'name', 'display_name', 'type', 'required',
    ];
}
