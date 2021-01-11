<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;
    protected $table='experiences';

    protected $fillable=['clinic_id','hospital_name','from','to'];

    public function clinic()
    {
        return $this->belongsTo('App\Models\Clinic');
    }
}
