<?php

namespace App\Http\Controllers\Api;

use App\Attribute;
use App\Http\Controllers\Controller;

class AttributeController extends Controller
{
    function list() {
        return Attribute::all();
    }
    public function get($id)
    {
        return Attribute::findOrFail($id);
    }
}
