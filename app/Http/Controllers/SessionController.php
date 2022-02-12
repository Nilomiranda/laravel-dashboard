<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends BaseController {
    public function create(Request $request)
    {
        $data = $request->toArray();

        $users = User::where('email', $data['email'])->get();
        $user = $users[0];

        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password'] ?? '']))
        {
            $request->session()->put('user_id', $user['id']);

            return response()->json($user)->cookie(
                'session_token', 'sdawdaw31223', 60 * 24 * 7
            );
        }

        return ["error" => "Wrong credentials"];
    }
}
