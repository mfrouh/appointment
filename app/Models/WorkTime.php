<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkTime extends Model
{
    use HasFactory;
    protected $table='work_times';

    protected $fillable=['work_date_id','start','end'];

    public function workdate()
    {
        return $this->belongsTo('App\Models\WorkDate');
    }
}
