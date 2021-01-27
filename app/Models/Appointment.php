<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $table='appointments';

    protected $fillable=['clinic_id','day','time','patient_id','booking_id','appointment_time_id','price','booking','diagnose'];

    public function clinic()
    {
        return $this->belongsTo('App\Models\Clinic');
    }

    public function patient()
    {
        return $this->belongsTo('App\Models\Patient');
    }

    public function time()
    {
        return $this->belongsTo('App\Models\AppointmentTime');
    }

}
