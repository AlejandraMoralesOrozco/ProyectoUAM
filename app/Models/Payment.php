<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function payment_status(){
        return $this->belongsTo(Payment_status::class);
    }

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function courses(){
        return $this->belongsTo(Course::class);
    }
}
