<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    use SoftDeletes;

    protected $hidden = ['created_by', 'updated_by', 'deleted_by', 'created_at', 'updated_at', 'deleted_at'];

    protected $fillable = [
        'status',
        'place_id',
        'room_id',
        'client_info_id',
        'payment_info_id',
        'reservation_date',
        'hour_id',
        'players',
        'payment_method',
        'promotion_code',
        'discount',
        'comment',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    protected $with = [
        'place',
        'room',
        'clientInfo',
        'paymentInfo',
        'hour',
        'price'
    ];
    protected $casts = [
        'reservation_date' => 'date:d-m-Y',
        'created_at' => 'date:d-m-Y',
        'reservation_hour' => 'date:H:i',
    ];



    public function place(): BelongsTo
    {
        return $this->BelongsTo(Place::class);
    }
    public function room(): BelongsTo
    {
        return $this->BelongsTo(Room::class);
    }
    public function hour(): BelongsTo
    {
        return $this->BelongsTo(Hour::class);
    }
    public function clientInfo(): BelongsTo
    {
        return $this->BelongsTo(ClientInfo::class);
    }
    public function paymentInfo(): BelongsTo
    {
        return $this->BelongsTo(PaymentInfo::class);
    }
    public function price(): BelongsTo
    {
        return $this->BelongsTo(Price::class, 'room_id', 'room_id');
    }
    public function createdBy(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }
    public function updatedBy(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }
    public function deletedBy(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }

    public function scopeStatus($query){
        return $query->where('status', 1);
    }

}
