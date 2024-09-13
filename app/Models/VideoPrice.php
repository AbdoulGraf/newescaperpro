<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VideoPrice extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'price', 'place_id'];

    public function place(): BelongsTo
    {
        return $this->BelongsTo(Place::class);
    }

}
