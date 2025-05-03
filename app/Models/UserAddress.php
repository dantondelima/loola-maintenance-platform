<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;

    protected $table = 'user_address';

    protected $fillable = [
        'user_id',
        'country_id',
        'state_id',
        'city_id',
        'street',
        'number',
        'complement',
        'neighborhood',
        'postal_code',
    ];
}
