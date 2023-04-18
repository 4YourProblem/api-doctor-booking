<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        switch ($user->role) {
            case User::ROLE_USER:
                $profile = User::find($user->id);
                break;
            case User::ROLE_PATIENT:
                $profile = Patient::find($user->id);
                break;
            case User::ROLE_DOCTOR:
                $profile = Doctor::find($user->id);
                break;
        }

        if ($user->role == User::ROLE_USER) {
            $profile = User::select('name', 'email', 'phone')
                ->where('id', $user->id)
                ->first();
        } elseif ($user->role == User::ROLE_PATIENT) {
            $profile = Patient::with([
                'user' => function ($query) {
                    $query->select('name', 'email', 'phone', 'id');
                }
            ])
                ->select('user_id', 'avatar', 'address', 'birthday', 'gender', 'medical_history')
                ->where('user_id', $user->id)
                ->first()
                ->makeHidden('user_id');
        } elseif ($user->role == User::ROLE_DOCTOR) {
            $profile = Doctor::with([
                'user' => function ($query) {
                    $query->select('name', 'email', 'phone', 'id');
                }
            ])
                ->select('user_id', 'avatar', 'address', 'education', 'specialty', 'work_experience')
                ->where('user_id', $user->id)
                ->first()
                ->makeHidden('user_id');
        }
        return response()->json($profile);
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $this->validate($request, [
            'email' => 'required|email',
            'phone' => 'required|digits:10',
            'avatar' => 'required|image',
        ]);
        switch ($user->role) {
            case User::ROLE_USER:
                $user_id = User::findOrFail($id);
                break;
            case User::ROLE_PATIENT:
                $user_id = Patient::findOrFail($id);
                break;
            case User::ROLE_DOCTOR:
                $user_id = Doctor::findOrFail($id);
                break;
        }
        if ($user->role == User::ROLE_USER) {
            $user_id->fill([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone
            ]);
            $user_id->save();
        } elseif ($user->role == User::ROLE_PATIENT) {
            $user_id->user->name = $request->input('name');
            $user_id->user->email = $request->input('email');
            $user_id->user->phone = $request->input('phone');
            $user_id->fill([
                'address' => $request->address,
                'birthday' => $request->birthday,
                'gender' => $request->gender,
                'medical_history' => $request->medical_history,
            ]);

            if ($request->hasFile('avatar')) {
                $image = $request->file('avatar');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $filename);
                $user_id['avatar'] = $filename;
            }
            $user_id->user->save();
            $user_id->save();
        } elseif ($user->role == User::ROLE_DOCTOR) {
            $user_id->user->name = $request->input('name');
            $user_id->user->email = $request->input('email');
            $user_id->user->phone = $request->input('phone');
            $user_id->fill([
                'address' => $request->address,
                'education' => $request->education,
                'specialty' => $request->specialty,
                'work_experience' => $request->work_experience,
            ]);

            if ($request->hasFile('avatar')) {
                $image = $request->file('avatar');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $filename);
                $user_id['avatar'] = $filename;
            }
            $user_id->user->save();
            $user_id->save();
        } else {
            return response()->json('Unauthorised');
        }
        return response()->json(['message' => 'Update Profile Sucessfully']);
    }
}
