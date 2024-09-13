<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Storyline extends Model
{
    use HasFactory;

    protected $fillable = ['header', 'header_title', 'storyline_description', 'placefor', 'room_id'];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    
}
