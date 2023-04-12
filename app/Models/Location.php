<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'patient_id',
        'address',
        'latitude',
        'longitude',

    ];
    protected $table = 'locations';


    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function booking()
    {
        return $this->hasOne(Booking::class);
    }
}
