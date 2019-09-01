<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Unit;

class UnitController extends Controller
{
    function list() {
        return Unit::all();
    }
    public function get($id)
    {
        return Unit::findOrFail($id);
    }
}
