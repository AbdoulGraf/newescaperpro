<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Signature extends Model
{
    use SoftDeletes;

    protected $hidden = ['created_by', 'updated_by', 'deleted_by', 'created_at', 'updated_at', 'deleted_at'];

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'signature',
        'terms',
        'privacy',
        'refund',
        'liability',
        'room_id',
        'deleted_by',
    ];
//    protected $with = ['place','hour','price'];
    protected $casts = [
        'created_at' => 'date:Y-m-d H:i',
    ];
}
