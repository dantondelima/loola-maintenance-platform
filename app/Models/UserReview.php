<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserReview extends Model
{
    use HasFactory;

    protected $table = 'user_reviews';

    protected $fillable = [
        'reviewed_user_id',
        'reviewer_user_id',
        'service_order_id',
        'description',
        'rating',
        'is_done',
        'is_visible',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'is_visible',
        'is_done',
    ];
}
