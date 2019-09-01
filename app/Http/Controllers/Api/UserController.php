<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $credentials = request(['email', 'password']);
        if (!auth()->attempt($credentials)) {
            return response()->json(
                [
                    'message' => 'Unauthorized',
                ],
                401
            );
        }
        $user = $request->user();
        $user->load(
            'activities',
            'transactions',
            'missions',
            'roles'
        );
        return [
            'user' => $user,
            'access_token' => $user->createToken('Personal Access Token')
                ->accessToken,
            'token_type' => 'Bearer',
        ];
    }
    public function update(Request $request)
    {
        $user = $request->user();
        $user->load(
            'activities',
            'transactions',
            'missions',
            'roles'
        );
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,id,' . $user->id,
            'phone' => 'required|phone:AUTO,TR',
            'distributor_id' => 'required|exists:distributors,id',
        ]);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => phone($request->phone, 'TR'),
            'distributor_id' => $request->distributor_id,
        ]);
        return $user;
    }
    public function me(Request $request)
    {
        $user = $request->user();
        $user->load(
            'activities',
            'transactions',
            'missions',
            'roles'
        );
        return response()->json($user);
    }
}
