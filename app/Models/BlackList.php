<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlackList extends Model
{
    use HasFactory;

    protected $table='black_lists';

    protected $fillable=['clinic_id','phone_number'];

    public function clinic()
    {
        return $this->belongsTo('App\Models\Clinic');
    }
}
