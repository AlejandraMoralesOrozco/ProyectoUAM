<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    //One to Many relationship
    public function academic_unit(){
        return $this->belongsTo(Academic_unit::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function observations(){
        return $this->hasMany(Observation::class);
    }

}
