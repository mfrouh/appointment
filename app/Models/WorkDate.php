<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkDate extends Model
{
    use HasFactory;
    protected $table='work_dates';

    protected $fillable=['clinic_id','day'];

    public function time()
    {
        return $this->hasOne('App\Models\WorkTime');
    }
    public function clinic()
    {
        return $this->belongsTo('App\Models\Clinic');
    }

}
