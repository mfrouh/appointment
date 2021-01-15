<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    protected $table='prescriptions';

    protected $fillable=['clinic_id','patient_id','name'];

    public function clinic()
    {
        return $this->belongsTo('App\Models\Clinic');
    }
    public function patient()
    {
        return $this->belongsTo('App\Models\Patient');
    }
    public function contents()
    {
        return $this->hasMany('App\Models\PrescriptionContent');
    }

}
