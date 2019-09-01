<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mission;
use App\UserMission;

class MissionController extends Controller
{
    function list() {
        return Mission::with(
            'unit',
            'distributor'
        )
            ->where('distributor_id', auth()->user()->distributor_id)
            ->get();
    }
    public function get($id)
    {
        return Mission::with(
            'unit',
            'distributor'
        )
            ->where('id', $id)
            ->where('distributor_id', auth()->user()->distributor_id)
            ->firstOrFail();
    }
    public function mark_as_done($id)
    {
        $mission = Mission::with(
            'unit',
            'distributor'
        )
            ->where('id', $id)
            ->where('distributor_id', auth()->user()->distributor_id)
            ->firstOrFail();
        UserMission::firstOrCreate([
            "user_id" => auth()->user()->id,
            "mission_id" => $mission->id,
        ]);
        return [
            "message" => "Success",
        ];
    }
}
