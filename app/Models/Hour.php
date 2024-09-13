<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hour extends Model
{
    use SoftDeletes;

    protected $hidden = ['created_by', 'updated_by', 'deleted_by', 'created_at', 'updated_at', 'deleted_at'];

    protected $fillable = [
        'start',
        'end',
        'start_period',
        'end_period',
        'place_id',
        'room_id',
    ];
    protected $casts = [
        'start' => 'date:H:i',
        'end' => 'date:H:i',
        'reserved_dates' => 'date:Y-m-d',
        'created_at' => 'date:d/m/Y - H:i',
    ];

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }

    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
//            ->whereDate('reservation_date', '!=', Carbon::now()->toDateString());
    }


    public function scopeAvailable($query, $room){

        return $query->whereNotIn('id', function ($subQuery) use ($room) {
            $subQuery->select('hour_id')->from('reservations')
                ->whereDate('reservation_date', Carbon::today()->toDateString())
                ->where('room_id', $room);
        })->where('room_id', $room)->where('start', '>=', Carbon::now()->toTimeString());


    }

    public function scopeNext($query, $detail){
        extract($detail);
        return $query->whereNotIn('id', function ($subQuery) use ($room, $date) {
            $subQuery->select('hour_id')->from('reservations')
                ->whereDate('reservation_date', $date)
                ->where('room_id', $room);
        })->where('room_id', $room);
    }

}
