<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Boolean;

class AppointmentTime extends Model
{
    use HasFactory;
    protected $table='appointment_times';

    protected $fillable=['appointment_date_id','time','booked'];

    protected $casts=['booked'=>'boolean'];

    public function date()
    {
        return $this->belongsTo('App\Models\AppointmentDate');
    }
}
