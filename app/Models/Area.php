<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function prospects(){
        return $this->belongsToMany(Prospect::class);
    }

    public function instructors(){
        return $this->belongsToMany(Instructor::class);
    }

    public function courses(){
        return $this->belongsToMany(Course::class);
    }
}
