<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Place extends Model
{
    use SoftDeletes;

    protected $hidden = ['created_by', 'updated_by', 'deleted_by', 'created_at', 'updated_at', 'deleted_at'];

    protected $fillable = [
        'id',
        'status',
        'order',
        'title',
        'description',

        'created_by',
        'updated_by',
        'deleted_by',

        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function rooms(): HasMany
    {
        return $this->hasMany(Room::class);
    }
    public function reservation(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }
}
