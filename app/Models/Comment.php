<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'person_name',
        'placefor',
        'room_id',
        'person_comment',
        'person_image',
        'comment_date',
    ];

    
}
