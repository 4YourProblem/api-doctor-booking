<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
// use TCG\Voyager\Traits\Spatial;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'role'
    ];

    const ROLE_DOCTOR = 'ROLE_DOCTOR';
    const ROLE_USER = 'ROLE_USER';
    const ROLE_PATIENT = 'ROLE_PATIENT';
    const ROLE_ADMIN = 'ROLE_ADMIN';

    protected $table = 'users';
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }

    public function patients()
    {
        return $this->hasMany(Patient::class);
    }

    public function doctorRequest()
    {
        return $this->hasOne(DoctorRequest::class);
    }

    public function isDoctor()
    {
        return $this->role === 'ROLE_DOCTOR';
    }

    // public function setRole($role)
    // {
    //     $this->attributes['role'] = $role;
    // }
}
