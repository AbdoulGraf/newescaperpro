<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ClientInfo extends Model
{
    protected $hidden = ['created_at', 'updated_at'];

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
        'city',
        'country',
        'ipAddress',
        'device',
        'browser',
        'browser_version',
        'platform',
        'platform_version',
        'language',
    ];

    public function getFullNameAttribute(): string
    {
        return "$this->first_name $this->last_name";
    }

    public function reservation(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }
    public function request_videos(): HasMany
    {
        return $this->hasMany(RequestVideo::class);
    }
}
