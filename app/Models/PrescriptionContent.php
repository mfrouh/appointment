<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrescriptionContent extends Model
{
    use HasFactory;

    protected $table='prescription_contents';

    protected $fillable=['prescription_id','name','quantity','message'];

    public function prescription()
    {
        return $this->belongsTo('App\Models\Prescription');
    }
}
