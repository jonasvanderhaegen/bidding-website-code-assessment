<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lot extends Model
{
    // Traits
    use SoftDeletes;


    // Variables
    protected $casts = [
        'status' => 'boolean'
    ];

    protected $fillable = [
        'currency',
        'datetime_start',
        'datetime_end',
        'min_bid_amount',
        'name',
        'meta_description',
        'short_description',
        'long_description',
        'total_estimated_value',
        'highest_bid',
        'bidvibe_profit',
        'processed_after_expiration',
        'priority',
        'status',
        'state_id',
        'user_id'
    ];


    // Relations

        // one Lot to one x
        public function order(): hasOne
        {
            return $this->hasOne(Order::class);
        }

        public function user(): belongsTo
        {
            return $this->belongsTo(User::class);
        }

        // one Lot to many x
        public function bids(): hasMany
        {
            return $this->hasMany(Bid::class);
        }

        public function images(): hasMany
        {
            return $this->hasMany(LotImage::class);
        }

        // many Lots to one x

        // many Lots to many x

        // Polymorphic
}
