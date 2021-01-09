<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    use HasFactory;
    protected $table='socials';

    protected $fillable=['clinic_id','facebook','youtube','twitter','instagram'];

    public function clinic()
    {
        return $this->belongsTo('App\Models\Clinic');
    }
}
