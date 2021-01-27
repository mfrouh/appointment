<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    use HasFactory;

    protected $table='clinics';

    protected $fillable=['speciality_id','phone1','phone2','user_id','address','name','image','city_id','governorate_id','time_appointment','price','type_booking'];

    public static function boot()
    {
        parent::boot();
        static::saving(function ($model) {
            if (!is_string($model->image)) {
                $model->image = sortimage('storage/clinics/main',$model->image);
            }
        });
    }
    public function ScopeActive($q)
    {
        $q->where('status','active');
    }
    public function ScopeInActive($q)
    {
        $q->where('status','inactive');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function speciality()
    {
        return $this->belongsTo('App\Models\Speciality');
    }
    public function gallery()
    {
       return $this->morphMany('App\Models\Image','imageable');
    }

    public function followups()
    {
        return $this->hasMany('App\Models\FollowUp');
    }

    public function appointments()
    {
        return $this->hasMany('App\Models\Appointment');
    }

    public function bookings()
    {
        return $this->hasMany('App\Models\Booking');
    }

    public function patients()
    {
        return $this->hasMany('App\Models\Patient');
    }

    public function prescriptions()
    {
        return $this->hasMany('App\Models\Prescription');
    }

    public function surgeries()
    {
        return $this->hasMany('App\Models\Surgery');
    }

    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }

    public function blacklists()
    {
        return $this->hasMany('App\Models\BlackList');
    }

    public function appointmentdates()
    {
        return $this->hasMany('App\Models\AppointmentDate');
    }

    public function workdates()
    {
        return $this->hasMany('App\Models\WorkDate');
    }

    public function social()
    {
        return $this->hasOne('App\Models\Social');
    }

    public function services()
    {
        return $this->hasMany('App\Models\Service');
    }

    public function educations()
    {
        return $this->hasMany('App\Models\Education');
    }

    public function experiences()
    {
        return $this->hasMany('App\Models\Experience');
    }
    public function rateone($id)
    {
        if(Review::where('clinic_id',$this->id)->where('rate','!=',null)->count()!=0)
        {
         return (Review::where('clinic_id',$this->id)->where('rate',$id)->count()/$this->ratecount())*100;
        }
        return 0;
    }
    public function rates()
    {
        if(Review::where('clinic_id',$this->id)->where('rate','!=',null)->count()!=0)
        {
        return Review::where('clinic_id',$this->id)->where('rate','!=',null)->sum('rate')/$this->ratecount();
        }
        return 0;
    }
    public function ratecount()
    {
        if(Review::where('clinic_id',$this->id)->where('rate','!=',null)->count()!=0)
        {
        return Review::where('clinic_id',$this->id)->where('rate','!=',null)->count();
        }
        return 0;
    }
}
