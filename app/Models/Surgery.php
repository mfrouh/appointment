<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surgery extends Model
{
    use HasFactory;

    protected $table='surgeries';

    protected $fillable=['clinic_id','name','day','time','price','hospital_name'];

    public function clinic()
    {
        return $this->belongsTo('App\Models\Clinic');
    }

}
