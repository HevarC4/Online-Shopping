<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phoneNumber',
        'role',
        'address',
    ];

    protected $hidden = [
        'password',
    ];

    // role
    public function isAdmin(){
        return $this->role == 1 ? true : false;
    }

    public function setPasswordAttribute($value){
        $this->attributes['password'] = Hash::make($value);
    }
}
