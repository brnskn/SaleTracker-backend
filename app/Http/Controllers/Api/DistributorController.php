<?php

namespace App\Http\Controllers\Api;

use App\Distributor;
use App\Http\Controllers\Controller;

class DistributorController extends Controller
{
    function list() {
        return Distributor::all();
    }
    public function get($id)
    {
        return Distributor::findOrFail($id);
    }
}
