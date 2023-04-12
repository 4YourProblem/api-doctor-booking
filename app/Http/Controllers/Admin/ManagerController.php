<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\User;

class ManagerController extends Controller
{
    public function doctor()
    {
        $doctor = Doctor::with([
            'user' => function ($query) {
                $query->select('name', 'id');
            },

        ])
            ->get()
            ->makeHidden(['created_at', 'updated_at', 'deleted_at', 'id', 'user_id']);
        return response()->json($doctor);
    }

    public function patient()
    {
        $patient = Patient::with([
            'user' => function ($query) {
                $query->select('name', 'id');
            }
        ])
            ->get()
            ->makeHidden(['created_at', 'updated_at', 'deleted_at', 'id', 'user_id']);
        return response()->json($patient);
    }

    public function user()
    {
        $user = User::where('role', '=', 'ROLE_USER')
            ->get()
            ->makeHidden(['created_at', 'updated_at', 'deleted_at', 'id', 'email_verified_at', 'password', 'role']);
        return response()->json($user);
    }
}
