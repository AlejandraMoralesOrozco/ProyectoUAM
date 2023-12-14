<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Academic_level extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    //One to Many relationship
    public function users(){
        return $this->hasMany(User::class);
    }
}
