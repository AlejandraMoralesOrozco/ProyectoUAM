<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function areas(){
        return $this->belongsToMany(Area::class);
    }

    public function user(){
        return $this->belongsToMany(User::class);
    }

    public function instructors(){
        return $this->belongsToMany(Instructor::class);
    }

    public function period(){
        return $this->belongsTo(Period::class);
    }

    public function academic_activity(){
        return $this->belongsTo(Academic_activity::class);
    }

    public function program(){
        return $this->belongsTo(Program::class);
    }

    public function duration(){
        return $this->belongsTo(Duration::class);
    }

    public function modality(){
        return $this->belongsTo(Modality::class);
    }

    public function schedules(){
        return $this->belongsToMany(Schedule::class);
    }

    public function audience(){
        return $this->belongsTo(Audience::class);
    }

    public function level(){
        return $this->belongsTo(Level::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }

    public function certificates(){
        return $this->hasMany(Certification::class);
    }

    public function status(){
        return $this->belongsTo(Status::class);
    }

    public function pay(){
        return $this->hasOne(Payment::class);
    }

    public function observations(){
        return $this->hasMany(Observation::class);
    }
}
