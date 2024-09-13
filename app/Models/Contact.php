<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contact extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'place_id',
        'room_id',
        'email',
        'phone',
        'subject',
        'phone_zone',
        'message',
    ];

    public function rooms(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }

    public function place(): BelongsTo
    {
        return $this->belongsTo(Place::class);
    }
}
