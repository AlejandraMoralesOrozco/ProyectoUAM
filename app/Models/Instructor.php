<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function documents(){
        return $this->belongsToMany(Document::class, 'document_instructor', 'instructor_id', 'document_id')
            ->withPivot('url', 'date');
    }

    public function areas(){
        return $this->belongsToMany(Area::class);
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function courses(){
        return $this->belongsToMany(Course::class);
    }
}
