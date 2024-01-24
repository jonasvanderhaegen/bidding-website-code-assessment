<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bid extends Model
{
    // Traits
    use SoftDeletes;


    // Variables
    protected $fillable = [
        'amount',
        'email',
        'phone',
        'firstname',
        'lastname',
        'lot_id',
        'user_id',
        'deleted_at'
    ];


    // Relations

    // one Bid to one x

    // one Bid to many x

    // many Bids to one x
    public function lot(): BelongsTo
    {
        return $this->belongsTo(Lot::class);
    }

    // many Bids to many x
}
