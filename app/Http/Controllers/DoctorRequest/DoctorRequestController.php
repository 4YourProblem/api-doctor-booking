<?php

namespace App\Http\Controllers\DoctorRequest;

use App\Http\Controllers\Controller;
use App\Http\Requests\DoctorRequestRequests;
use App\Models\DoctorRequest;
use Illuminate\Support\Facades\Auth;

class DoctorRequestController extends Controller
{
    public function doctorRequest(DoctorRequestRequests $request)
    {
        $user = Auth::user();

        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $filename);
        }

        if ($files = $request->file('resume_path')) {
            $file = $request->file('resume_path');
            $fileCV = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('cv'), $fileCV);
        }

        $doctorRequest = new DoctorRequest();
        $doctorRequest->fill([
            $doctorRequest->user_id = $user->id,
            $doctorRequest->avatar = $filename,
            $doctorRequest->address = $request->input('address'),
            $doctorRequest->education = $request->input('education'),
            $doctorRequest->specialty = $request->input('specialty'),
            $doctorRequest->work_experience = $request->input('work_experience'),
            $doctorRequest->resume_path = $fileCV,
        ]);
        $doctorRequest->save();

        return response()->json(['message' => 'Your request has been sent to the administrator, Please wait for the administrator to approve the application']);
    }
}
