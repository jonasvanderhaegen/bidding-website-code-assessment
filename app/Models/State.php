<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class State extends Model
{
    // Traits
    use HasFactory;


    // Variables
    protected $fillable = ['title', 'model'];

    public $timestamps = false;


    // Relations

        // one State to one x
        // one State to many x
        public function orders(): HasMany
        {
            return $this->hasMany(Order::class);
        }

        // many States to one x
        // many States to many x
}
