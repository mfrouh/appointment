<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table='images';

    protected $fillable=['imageable_id','imageable_type','url'];

    public function imageable()
    {
       return $this->morphTo();
    }
    public static function boot()
    {
        parent::boot();
        static::saving(function ($model) {
            if (!is_string($model->url)) {
                $model->url = sortimage('storage/clinic',$model->url);
            }
        });
    }

}
