<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'booking_id',
        'patient_id',
        'fee',
        'method',
        'status'

    ];
    protected $table = 'payments';


    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function booking()
    {
        return $this->hasOne(Booking::class);
    }
}
