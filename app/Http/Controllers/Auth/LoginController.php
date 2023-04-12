<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequests;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function login(LoginRequests $request)
    {
        $credentials = $request->only(['email', 'password']);
        if ($credentials) {

            if (Auth::attempt($credentials)) {
                $user = Auth::user();
                $user = $request->user();
                $success = $user->createToken('authToken')->accessToken;
                return response()->json(['message' => 'true', 'token' => $success, 'user' => $user]);
            } else {
                return response()->json(['message' => 'Unauthorised'], 401);
            }
        } else {
            return response()->json(['message' => 'Unauthorised'], 401);
        }
    }
}
