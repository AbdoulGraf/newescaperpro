<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoVideo extends Model
{
    use HasFactory;

    protected $table = 'photos_videos';

    protected $fillable = ['name', 'placefor', 'room_id', 'photos_img', 'videos_mp4'];



    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
