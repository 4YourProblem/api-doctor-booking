<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    public function sendResetLinkEmail()
    {
        $credentials = request()->validate(['email' => 'required|email']);

        Password::sendResetLink($credentials);
        return response()->json(["msg" => 'Reset password link sent on your email.']);
    }
}
