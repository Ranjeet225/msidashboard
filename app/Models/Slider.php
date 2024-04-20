<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    public function images()
    {
        return $this->hasMany(Image::class,'slider_id','id');
    }

    protected $guarded =[];
}
