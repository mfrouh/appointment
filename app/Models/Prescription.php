<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    protected $table='prescriptions';

    protected $fillable=['clinic_id','name'];

    public function clinic()
    {
        return $this->belongsTo('App\Models\Clinic');
    }

}
