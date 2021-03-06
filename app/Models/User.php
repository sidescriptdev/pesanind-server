<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'user';

    protected $table = 'users';

    protected $fillable = [ 'name', 'email', 'password', ];

    protected $hidden = [ 'password', 'remember_token', ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value); 
    }

    public function Order()
    {
        $this->hasMany(OrderHospital::class);
    }
}
