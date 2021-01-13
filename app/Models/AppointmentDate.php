<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentDate extends Model
{
    use HasFactory;
    protected $table='appointment_dates';

    protected $fillable=['clinic_id','day'];
    protected $casts=['day'=>'date'];
    public function times()
    {
        return $this->hasMany('App\Models\AppointmentTime');
    }
    public function clinic()
    {
        return $this->belongsTo('App\Models\Clinic');
    }
}
