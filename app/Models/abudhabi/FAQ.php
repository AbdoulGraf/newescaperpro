<?php

namespace App\Models\abudhabi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    use HasFactory;

    protected $table="faqs";

    protected $fillable = [
        'question',
        'placefor',
        'answer',
    ];
}
