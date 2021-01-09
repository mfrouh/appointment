<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    use HasFactory;

    protected $table='specialities';

    protected $fillable=['name','slug','image','active'];

    public static function boot()
    {
        parent::boot();
        static::saving(function ($model) {
            $model->slug = str_replace(' ','_',$model->name);
            $model->image = sortimage('storage/specialities/',$model->image);
        });
    }
    public function ScopeActive($q)
    {
        $q->where('active',1);
    }
    public function ScopeInActive($q)
    {
        $q->where('active',0);
    }

}
