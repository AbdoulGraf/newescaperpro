<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;

    protected $hidden = ['deleted_by', 'created_at', 'updated_at', 'deleted_at'];

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'event_type',
        'message',
    ];
    protected $casts = [
        'created_at' => 'date:d-m-Y H:i',
        'deleted_at' => 'date:d-m-Y H:i',
    ];

    public function scopeStatus($query){
        return $query->where('status', 1);
    }
}
