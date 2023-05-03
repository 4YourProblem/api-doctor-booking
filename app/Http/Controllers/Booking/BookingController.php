<?php

namespace App\Http\Controllers\Booking;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Doctor;
use App\Models\Location;
use App\Models\Patient;
use App\Models\User;
use Geocoder\Exception\InvalidServerResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{

    public function showDoctor()
    {
        $user = Auth::user();
        if (in_array($user->role, [User::ROLE_USER, User::ROLE_PATIENT])) {
            $doctor = Doctor::join('users', 'users.id', '=', 'doctors.user_id')
                ->orderBy('users.name')
                ->select('doctors.id', 'avatar', 'specialty', 'availability', 'users.name', 'user_id')
                ->get()
                ->makeHidden([
                    'education', 'work_experience', 'created_at', 'updated_at', 'deleted_at',
                    'approved', 'resume_path', 'address'
                ]);
        } else {
            return response()->json(['message' => 'You no permission to do this']);
        }
        return response()->json($doctor);
    }

    public function showDetailDoctor($id)
    {
        $doctor = Doctor::with([
            'user' => function ($query) {
                $query->select('name', 'id');
            }
        ])
            ->where('id', $id)
            ->first();
        $user = Auth::user();
        if (in_array($user->role, [User::ROLE_USER, User::ROLE_PATIENT])) {
            $doctor->makeHidden([
                'created_at', 'updated_at', 'deleted_at', 'approved', 'resume_path',
            ]);

            $patientCount = Booking::where('doctor_id', $doctor->id)
                ->where('status', Booking::STATUS_COMPLETED)
                ->groupBy('patient_id')
                ->distinct()
                ->count('patient_id');

            return response()->json([
                'info' => $doctor,
                'patients' => $patientCount
            ]);
        }
    }

    public function booking($id, Request $request)
    {
        $doctor = Doctor::findOrFail($id);
        $user = Auth::user();
        if (in_array($user->role, [User::ROLE_USER, User::ROLE_PATIENT])) {
            if ($request->hasFile('avatar')) {
                $image = $request->file('avatar');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $filename);

                $patient = Patient::where([
                    ['user_id', $user->id],
                    ['address', $request->input('address')],
                    ['birthday', $request->input('birthday')],
                    ['gender', $request->input('gender')],
                    ['medical_history', $request->input('medical_history')],
                ])->first();
                if (!$patient) {
                    $patient = new Patient();
                    $patient->fill([
                        $patient->user_id = $user->id,
                        $patient->avatar = $filename,
                        $patient->address = $request->input('address'),
                        $patient->birthday = $request->input('birthday'),
                        $patient->gender = $request->input('gender'),
                        $patient->medical_history = $request->input('medical_history'),
                    ]);
                } elseif (!$patient) {
                    $patient = new Patient([
                        'user_id' => $user->id,
                        'address' => $request->input('address'),
                        'birthday' => $request->input('birthday'),
                        'gender' => $request->input('gender'),
                        'medical_history' => $request->input('medical_history'),
                    ]);
                }
                $patient->save();
            }
            $address = $request->input('address');

            try {
                $result = app('geocoder')->geocode($address)->get();
                $firstResult = $result->first();
                if ($firstResult !== null) {
                    $coordinates = $firstResult->getCoordinates();
                    $latitude = $coordinates->getLatitude();
                    $longitude = $coordinates->getLongitude();
                } else {
                    $latitude = Location::UNDEFINED;
                    $longitude = Location::UNDEFINED;
                }
            } catch (InvalidServerResponse $e) {
                $latitude = Location::UNDEFINED;
                $longitude = Location::UNDEFINED;
            }

            $location = Location::where([
                ['patient_id', $patient->id],
                ['address', $address],
                ['latitude', $latitude],
                ['longitude', $longitude],
            ])->first();
            if (!$location) {
                $location = new Location();
                $location->fill([
                    'patient_id' => $patient->id,
                    'address' => $address,
                    'latitude' => $latitude,
                    'longitude' => $longitude,
                ]);
                $location->save();
            }
            $booking = new Booking();
            $booking->fill([
                'doctor_id' => $doctor->id,
                'patient_id' => $patient->id,
                'location_id' => $location->id,
                'booking_date' => new Carbon($request->booking_date),
                'booking_time' => new Carbon($request->booking_time),
                'status' => Booking::STATUS_PENDING,
            ]);
            $booking->save();
            $user = $patient->user;
            $user->update(['role' => User::ROLE_PATIENT]);

            $showBooking = Booking::with([
                'doctor.user' => function ($query) {
                    $query->select('name', 'id');
                },
                'location' => function ($query) {
                    $query->select('address', 'id');
                },
            ])
                ->where('id', '=', $booking->id)
                ->select('doctor_id', 'location_id', 'booking_date', 'booking_time', 'status')
                ->get()
                ->makeHidden(['doctor_id', 'location_id'])
                ->each(function ($bookings) {
                    $bookings->doctor->makeHidden([
                        'id', 'user_id', 'education', 'work_experience',
                        'resume_path', 'availability', 'created_at', 'updated_at', 'deleted_at'
                    ]);
                });

            return response()->json([
                'message' => 'You have successfully booked, please wait for the doctor to check',
                'infor' => $showBooking
            ]);
        } else {
            return response()->json(['message' => 'Sorry, you no permission to use this']);
        }
    }

    public function cancelBooking($id)
    {
        $booking = Booking::findOrFail($id);
        $user = Auth::user();
        $users = User::where('id', $user->id)->first();
        if ($user->role == User::ROLE_PATIENT && $booking->patient->user == $users) {
            $booking->status = Booking::STATUS_CANCELLED;
            $booking->save();
        } else {
            return response()->json(['message' => 'You do not have permission to cancel this booking']);
        }
        return response()->json(['message' => 'Booking cancelled']);
    }

    public function historyBooking()
    {
        $user = Auth::user();
        $users = User::where('id', $user->id)->first();
        $booking = Booking::with([
            'doctor.user' => function ($query) {
                $query->select('name', 'id');
            },
            // 'location' => function ($query) {
            //     $query->select('address', 'id');
            // },
        ])
            ->join('patients', 'patients.id', '=', 'bookings.patient_id')
            ->join('users', 'users.id', '=', 'patients.user_id')
            ->where('users.id', '=', $users->id)
            ->select('doctor_id', 'location_id', 'booking_date', 'booking_time', 'status')
            ->get()
            ->makeHidden(['doctor_id', 'location_id'])
            ->each(function ($bookings) {
                $bookings->doctor->makeHidden([
                    'id', 'user_id', 'avatar', 'address', 'education', 'specialty', 'work_experience',
                    'resume_path', 'availability', 'created_at', 'updated_at', 'deleted_at'
                ]);
            });
        return response()->json($booking);
    }

    public function detailHistoryBooking($id)
    {
        $user = Auth::user();
        $users = User::where('id', $user->id)->first();
        $booking = Booking::with([
            'doctor.user' => function ($query) {
                $query->select('name', 'phone', 'id');
            },
            'location' => function ($query) {
                $query->select('address', 'id');
            },
        ])
            ->join('patients', 'patients.id', '=', 'bookings.patient_id')
            ->join('users', 'users.id', '=', 'patients.user_id')
            ->where('users.id', '=', $users->id)
            ->where('bookings.id', '=', $id)
            ->select('doctor_id', 'location_id', 'booking_date', 'booking_time', 'status')
            ->get()
            ->makeHidden(['doctor_id', 'location_id'])
            ->each(function ($bookings) {
                $bookings->doctor->makeHidden([
                    'id', 'user_id', 'education', 'work_experience',
                    'resume_path', 'availability', 'created_at', 'updated_at', 'deleted_at'
                ]);
            });
        return response()->json($booking);
    }
}
