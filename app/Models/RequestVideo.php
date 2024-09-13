<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RequestVideo extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'lastname',
        'phoneNumber',
        'email',
        'store',
        'room',
        'date',
        'time',
        'client_info_id',
        'video_type',
        'payment_method',
        'address_country',
        'address_city',
        'video_description',
        'status',
    ];
    protected $with = [
        'clientInfo',
    ];
    protected $casts = [
        'date' => 'date:Y-m-d',
        'created_at' => 'date:d-m-Y',
        'price' => 'integer',
    ];

    public function store(): BelongsTo
    {
        return $this->BelongsTo(Place::class);
    }
    public function room(): BelongsTo
    {
        return $this->BelongsTo(Room::class);
    }
    public function time(): BelongsTo
    {
        return $this->BelongsTo(Hour::class);
    }
    public function clientInfo(): BelongsTo
    {
        return $this->BelongsTo(ClientInfo::class, 'client_info_id', 'id');
    }
    public function paymentInfo(): BelongsTo
    {
        return $this->BelongsTo(PaymentInfo::class);
    }


}
