<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Price extends Model
{
    use SoftDeletes;

    protected $hidden = ['created_by', 'updated_by', 'deleted_by', 'created_at', 'updated_at', 'deleted_at'];

    protected $fillable = [
        'player',
        'price',
        'place_id',
        'room_id',
        'created_by',
    ];

    protected $with = ['place', 'room'];

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }
    public function place(): BelongsTo
    {
        return $this->belongsTo(Place::class);
    }
}
