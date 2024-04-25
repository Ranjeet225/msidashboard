<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function projectdetails()
    {
        return $this->hasMany(ProjectDetails::class,'title_id','id');
    }
}
