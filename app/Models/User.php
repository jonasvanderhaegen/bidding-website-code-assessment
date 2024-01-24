<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, softDeletes;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'admin' => 'boolean',
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Relations

        // one User to one x

        // one User to many x
        public function lots(): hasMany
        {
            return $this->hasMany(Lot::class);
        }

        public function orders(): hasMany
        {
            return $this->hasMany(Order::class);
        }


        // many Users to one x

        // many Users to many x

}
