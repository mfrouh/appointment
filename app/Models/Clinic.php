<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    use HasFactory;

    protected $table='clinics';

    protected $fillable=['user_id','address','clinic_name','image','city','state','country','time_appointment','price','type_booking'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function gallery()
    {
       return $this->morphMany('App\Models\Image','imageable');
    }

    public function followups()
    {
        return $this->hasMany('App\Models\FollowUp');
    }

    public function appointments()
    {
        return $this->hasMany('App\Models\Appointment');
    }

    public function bookings()
    {
        return $this->hasMany('App\Models\Booking');
    }

    public function patients()
    {
        return $this->hasMany('App\Models\Patient');
    }

    public function prescriptions()
    {
        return $this->hasMany('App\Models\Prescription');
    }

    public function surgeries()
    {
        return $this->hasMany('App\Models\Surgery');
    }

    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }

    public function blacklists()
    {
        return $this->hasMany('App\Models\BlackList');
    }

    public function appointmentdates()
    {
        return $this->hasMany('App\Models\AppointmentDate');
    }

    public function workdates()
    {
        return $this->hasMany('App\Models\WorkDate');
    }
}
