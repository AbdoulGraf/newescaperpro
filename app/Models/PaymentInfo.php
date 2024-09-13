<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PaymentInfo extends Model
{
    protected $hidden = ['created_at', 'updated_at'];

    protected $fillable = [
        'outlet_id',
        'order_id',
        'payment_id',
        'state',
        'amount',
        'currencyCode',
    ];
    public function reservation(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }
}
