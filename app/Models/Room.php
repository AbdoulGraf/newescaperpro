<?php

namespace App\Models;

use App\Http\Traits\UploadImage;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use UploadImage, SoftDeletes;

    protected $hidden = ['created_by', 'updated_by', 'deleted_by', 'created_at', 'updated_at', 'deleted_at'];

    protected $fillable = [
        'status',
        'order',
        'place_id',
        'title',
        'slug',
        'description',
        'duration',
        'level',
        'person',
        'poster',
        'banner',
        'text_picture',
        'created_by',
        'updated_by',
        'deleted_by',
        'seo_title',
        'seo_keywords',
        'seo_description',
    ];
//    protected $with = ['place','hour','price'];
    protected $casts = [
        'created_at' => 'date:d-m-Y',
    ];
    /**
     * Narrator info relation to user model
     *
     * @return BelongsTo
     */
    public function place(): BelongsTo
    {
        return $this->BelongsTo(Place::class);
    }
    public function reservation(): hasMany
    {
        return $this->hasMany(Reservation::class);
    }

    public function price(): hasMany
    {
        return $this->hasMany(Price::class);
    }

    public function hour(): hasMany
    {
        return $this->hasMany(Hour::class);
    }

    public function faqs(): hasMany
    {
        return $this->hasMany(FAQ::class);
    }



    public function scopeStatus($query){
        return $query->where('status', 1);
    }

    public function scopeDubaiRooms($query){
        return $query->where('place_id', 1);
    }

    public function scopeAbudhabiRooms($query){
        return $query->where('place_id', 2);
    }
}
