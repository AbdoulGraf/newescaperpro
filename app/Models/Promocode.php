<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promocode extends Model
{
    use HasFactory;
    protected $fillable = ['promocode', 'discount', 'start_date', 'validity_period', 'store_validity', 'status','placefor'];
}
