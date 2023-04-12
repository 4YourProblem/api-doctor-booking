<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequests;
use App\Http\Services\SendEmailService;
use App\Models\User;

class RegisterController extends Controller
{

    public function register(RegisterRequests $request, SendEmailService $emailService)
    {
        $email = $request->email;
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $input['role'] = 'ROLE_USER';
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->accessToken;

        $emailService->sendVerificationEmail($user->email);

        return response(['user' => $user, 'message' => 'Register successfully! Please check your Email or Spam your Email'], 201);
    }
}
