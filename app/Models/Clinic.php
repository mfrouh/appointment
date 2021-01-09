<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    use HasFactory;

    protected $table='clinics';

    protected $fillable=['user_id','address','city','state','country','open','close','time_appointment','price','type_booking'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function gallery()
    {
       return $this->morphMany('App\Models\Image','imageable');
    }
}
