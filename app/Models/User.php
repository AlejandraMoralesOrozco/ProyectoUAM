<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'lastname',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function adminlte_image(){
        return 'http://picsum.photos/300/300';
    }

    public function adminlte_desc(){
        return 'Admin';
    }

    public function adminlte_profile_url(){
        return 'profile/username';
    }

    public function instructor(){
        return $this->hasOne(Instructor::class, 'user_id');
    }

    public function admin(){
        return $this->hasOne(Admin::class);
    }

    public function courses(){
        return $this->belongsToMany(Course::class);
    }

    public function certificates(){
        return $this->hasMany(Certification::class);
    }

    public function payments(){
        return $this->hasMany(Payment::class);
    }

    public function Academic_leve(){
        return $this->belongsTo(Academic_level::class);
    }
}
