<?php

namespace App\Http\Controllers\Api;

use App\Activity;
use App\Attribute;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    function list() {
        return merge_meta(
            Activity::where('user_id', auth()->user()->id)
                ->get()
        );
    }
    public function get($id)
    {
        return merge_meta(
            Activity::where('user_id', auth()->user()->id)
                ->where('id', $id)
                ->firstOrFail()
        );
    }
    public function create(Request $request)
    {
        $request->validate(array_merge([
            'name' => 'required|string',
            'description' => 'required|string',
        ], attribute_validation()));
        $attributes = Attribute::all();
        $activity = Activity::create([
            "name" => $request->name,
            "description" => $request->description,
            "user_id" => $request->user()->id,
        ]);
        foreach ($attributes as $attribute) {
            $activity->setMeta(
                $attribute->name,
                $request->has($attribute->name) ?
                $request->{$attribute->name} : null
            );
        }
        return merge_meta($activity);
    }
    public function update(Request $request)
    {
        $request->validate(array_merge([
            'name' => 'required|string',
            'description' => 'required|string',
        ], attribute_validation()));
        $attributes = Attribute::all();
        $activity = Activity::where('user_id', auth()->user()->id)
            ->where('id', $request->id)
            ->firstOrFail();
        $activity->update([
            "name" => $request->name,
            "description" => $request->description,
            "user_id" => $request->user()->id,
        ]);
        foreach ($attributes as $attribute) {
            $activity->setMeta(
                $attribute->name,
                $request->has($attribute->name) ?
                $request->{$attribute->name} : null
            );
        }
        return merge_meta($activity);
    }
    public function delete($id)
    {
        $activity = Activity::where('user_id', auth()->user()->id)
            ->where('id', $id)
            ->firstOrFail();
        $activity->delete();
        return ["message" => "Success"];
    }
}
