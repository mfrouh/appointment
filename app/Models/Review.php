<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table='reviews';

    protected $fillable=['clinic_id','review','rate','phone_number'];

    public function clinic()
    {
        return $this->belongsTo('App\Models\Clinic');
    }
}
