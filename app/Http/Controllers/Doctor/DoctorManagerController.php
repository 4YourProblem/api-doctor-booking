<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Http\Services\SendEmailService;
use App\Models\Booking;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DoctorManagerController extends Controller
{
    public function checkBooking()
    {
        $user = Auth::user();
        if ($user->role == User::ROLE_DOCTOR) {
            $doctor = $user->doctors->first()->id;
            $booking = Booking::where('doctor_id', $doctor)
                ->with([
                    'patient.user' => function ($query) {
                        $query->select('name', 'id');
                    },
                    'location' => function ($query) {
                        $query->select('address', 'id');
                    }
                ])
                ->get()
                ->where('status', '=', Booking::STATUS_PENDING)
                ->makeHidden(['id', 'patient_id', 'doctor_id', 'location_id', 'created_at', 'updated_at', 'deleted_at'])
                ->each(function ($booking) {
                    $booking->patient->makeHidden(['id', 'user_id', 'address', 'birthday', 'gender', 'created_at', 'updated_at', 'deleted_at']);
                });
        } else {
            return response()->json(['message' => 'You no permission to do this']);
        }
        return response()->json($booking);
    }

    public function checkDetailBooking($id)
    {
        $booking = Booking::with([
            'patient.user' => function ($query) {
                $query->select('name', 'id');
            },
            'location' => function ($query) {
                $query->select('address', 'id');
            }
        ])
            ->where('id', $id)
            ->first();

        $user = Auth::user();
        if ($user->role == User::ROLE_DOCTOR) {
            if ($booking->status == Booking::STATUS_PENDING) {
                $booking->makeHidden(['id', 'patient_id', 'doctor_id', 'location_id', 'created_at', 'updated_at', 'deleted_at']);
                $booking->patient->makeHidden(['id', 'user_id', 'created_at', 'updated_at', 'deleted_at']);
                return response()->json($booking);
            } else {
                return response()->json(['message' => 'Booking is not pending'], 403);
            }
        } else {
            return response()->json(['message' => 'You no permission to do this'], 403);
        }
    }

    public function acceptBooking($id, SendEmailService $emailService)
    {
        $user = Auth::user();
        $doctor_id = $user->doctors->first()->id;
        $booking = Booking::findOrFail($id);
        if ($user->role == User::ROLE_DOCTOR && $booking->doctor_id == $doctor_id) {
            $booking->status = Booking::STATUS_ACCEPTED;
            $booking->save();
            $doctor = Doctor::findOrFail($doctor_id);
            $doctor->availability = Doctor::AVAILABILITY_BUSY;
            $doctor->save();
            $emailService->sendAcceptBookingEmail($user->email);
            return response()->json(['message' => 'Booking accepted']);
        } else {
            return response()->json(['message' => 'You are not authorized to accept this booking'], 403);
        }
    }

    public function cancelBooking($id, SendEmailService $emailService)
    {
        $user = Auth::user();
        $doctor_id = $user->doctors->first()->id;
        $booking = Booking::findOrFail($id);
        if ($user->role == User::ROLE_DOCTOR && $booking->doctor_id == $doctor_id) {
            $booking->status = Booking::STATUS_CANCELLED;
            $booking->save();
            $emailService->sendCancelBookingEmail($user->email);
            return response()->json(['message' => 'Booking cancelled']);
        } else {
            return response()->json(['message' => 'You are not authorized to cancel this booking'], 403);
        }
    }

    public function completeBooking($id, SendEmailService $emailService)
    {
        $user = Auth::user();
        $doctor_id = $user->doctors->first()->id;
        $booking = Booking::findOrFail($id);
        if ($user->role == User::ROLE_DOCTOR && $booking->doctor_id == $doctor_id) {
            $booking->status = Booking::STATUS_COMPLETED;
            $booking->save();
            $doctor = Doctor::findOrFail($doctor_id);
            $doctor->availability = null;
            $doctor->save();
            $emailService->sendCompleteBookingEmail($user->email);
            return response()->json(['message' => 'Booking completed']);
        } else {
            return response()->json(['message' => 'You are not authorized to complete this booking'], 403);
        }
    }
}
