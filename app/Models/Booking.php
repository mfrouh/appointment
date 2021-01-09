<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $table='bookings';

    protected $fillable=['clinic_id','appointment_time_id','verfied','verfication_code','phone_number','age','gender','name'];

    protected $casts=['verfied'=>'boolean'];

    public function appointmenttime()
    {
        return $this->belongsTo('App\Models\AppointmentTime');
    }
    public function clinic()
    {
        return $this->belongsTo('App\Models\Clinic');
    }
}
