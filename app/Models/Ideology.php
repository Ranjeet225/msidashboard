<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ideology extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function ideologydetails()
    {
        return $this->hasMany(IdeologyDetails::class,'title_id','id');
    }
}
