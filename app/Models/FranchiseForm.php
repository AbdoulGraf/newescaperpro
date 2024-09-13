<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FranchiseForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'lastname',
        'phoneNumber',
        'request_franchise',
        'message',
    ];

    
}
