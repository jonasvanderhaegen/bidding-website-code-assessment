<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Quote extends Model
{
    // Traits


    // Variables
    protected $fillable = [
        'coupon_code',
        'discount_amount',
        'subtotal',
        'shipping_amount',
        'tax_amount',
        'tax_amount_incl_vat',
        'weight',
        'weight_unit',
        'grand_total',
        'shipping_method',
        'shipping_description',
        'customer_email',
        'customer_firstname',
        'customer_lastname',
        'lot_id',
        'bid_id',
        'state_id',
        'user_id',
        'deleted_at'
    ];


    // Relations

        // one Order to one x
        public function lot(): belongsTo
        {
            return $this->belongsTo(Lot::class);
        }

        public function bid(): belongsTo
        {
            return $this->belongsTo(Bid::class);
        }

        // one Order to many x

        // many Orders to one x
        public function state(): belongsTo
        {
            return $this->belongsTo(State::class);
        }

        public function user(): belongsTo
        {
            return $this->belongsTo(User::class);
        }

        // many Orders to many x
}
