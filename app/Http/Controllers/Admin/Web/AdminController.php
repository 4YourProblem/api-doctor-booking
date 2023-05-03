<?php

namespace App\Http\Controllers\Admin\Web;

use App\Http\Controllers\Controller;
use App\Http\Services\SendEmailService;
use App\Models\Doctor;
use App\Models\DoctorRequest;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{

    function getLogin()
    {
        return view('auth/login');
    }

    function postLogin(Request $request)
    {
        $rules = [
            'email' => 'required',
            'password' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('login')->withErrors($validator)->withInput();
        } else {
            $email = $request->input('email');
            $password = $request->input('password');

            if (Auth::attempt(['email' => $email, 'password' => $password, 'role' => User::ROLE_ADMIN])) {
                return redirect('/admin/user');
            } else {
                Session::flash('error', 'Email hoặc mật khẩu không đúng!');
                return redirect('/login');
            }
        }
    }
    public function doctor()
    {
        $doctors = Doctor::with('user')->paginate(10);
        return view('admin/doctor', compact('doctors'));
    }

    public function destroyDoctor($id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();
        return redirect()->back()->with('success', 'User removed successfully!');
    }

    public function patient()
    {
        $patients = Patient::with('user')->paginate(10);
        return view('admin/patient', compact('patients'));
    }

    public function destroyPatient($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();
        return redirect()->back()->with('success', 'User removed successfully!');
    }

    public function user()
    {
        $users = User::where('role', '=', User::ROLE_USER)->paginate(10);
        return view('admin/user', compact('users'));
    }

    public function destroyUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('success', 'User removed successfully!');
    }

    public function doctorRequest()
    {
        $doctorRequests = DoctorRequest::with('user')->where('approved', '=', false)->paginate(10);
        return view('admin/doctor_request', compact('doctorRequests'));
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
        }
        return redirect()->back()->with('success', 'You have approved the request successfully');
    }

    public function refuseDoctor($id, SendEmailService $emailService)
    {
        $user = Auth::user();
        if ($user->role == User::ROLE_ADMIN) {
            $doctorRequest = DoctorRequest::findOrFail($id);
            $doctorRequest->delete();
            $emailService->sendRefusedDoctorEmail($user->email);
            return redirect()->back()->with('success', 'You have refused the request');
        }
    }
}
