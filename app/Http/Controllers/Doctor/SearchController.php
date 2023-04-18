<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $doctor = Doctor::with('user');
        if ($request->input('search')) {
            $search = $request->input('search');
            $doctor = $doctor->where('specialty', 'like', "%{$search}%")
                ->orWhereHas('user', function (Builder $query) use ($search) {
                    $query->where('name', 'like', "%{$search}%");
                });
        }
        $doctors = $doctor->with([
            'user' => function ($query) {
                $query->select('name', 'id');
            }
        ])
            ->get()
            ->makeHidden(['user_id', 'id', 'education', 'work_experience', 'resume_path', 'availability', 'created_at', 'updated_at', 'deleted_at']);
        return response()->json($doctors);
    }
}
