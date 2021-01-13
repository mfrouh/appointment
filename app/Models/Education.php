<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $table='education';

    protected $fillable=['clinic_id','degree','college','from','to'];

    public function clinic()
    {
        return $this->belongsTo('App\Models\Clinic');
    }
}
