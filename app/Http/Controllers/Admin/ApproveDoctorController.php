<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\SendEmailService;
use App\Models\Doctor;
use App\Models\DoctorRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ApproveDoctorController extends Controller
{
    public function showDoctorRequest()
    {
        $user = Auth::user();
        if ($user->role == User::ROLE_ADMIN) {
            $doctorRequest = DoctorRequest::with([
                'user' => function ($query) {
                    $query->select('name', 'id');
                }
            ])
                ->where('approved', false)
                ->get()
                ->makeHidden(['created_at', 'updated_at', 'deleted_at', 'id', 'user_id', 'approved']);
        } else {
            return response()->json(['message' => 'You no permission to do this']);
        }
        return response()->json([$doctorRequest]);
    }

    public function approveDoctor($id, SendEmailService $emailService)
    {
        $user = Auth::user();
        if ($user->role == User::ROLE_ADMIN) {
            $doctorRequest = DoctorRequest::findOrFail($id);
            $doctorRequest->update(['approved' => true]);

            $doctor = Doctor::create([
                'user_id' => $doctorRequest->user_id,
                'avatar' => $doctorRequest->avatar,
                'address' => $doctorRequest->address,
                'education' => $doctorRequest->education,
                'specialty' => $doctorRequest->specialty,
                'work_experience' => $doctorRequest->work_experience,
                'resume_path' => $doctorRequest->resume_path,
            ]);

            $user = $doctor->user;
            $user->update(['role' => User::ROLE_DOCTOR]);
            $emailService->sendApprovedDoctorEmail($user->email);
        } else {
            return response()->json(false);
        }
        return response()->json(['message' => 'You have approved the request successfully']);
    }

    public function refuseDoctor($id, SendEmailService $emailService)
    {
        $user = Auth::user();
        if ($user->role == User::ROLE_ADMIN) {
            $doctorRequest = DoctorRequest::findOrFail($id);
            $doctorRequest->delete();
            $emailService->sendRefusedDoctorEmail($user->email);
            return response()->json(['message' => 'You have refused the request']);
        } else {
            return response()->json(['message' => 'You no permission to do this']);
        }
    }
}
