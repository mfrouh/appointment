<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $table='bookings';

    protected $fillable=['clinic_id','phone_number','age','gender','name'];

    public function clinic()
    {
        return $this->belongsTo('App\Models\Clinic');
    }
}
