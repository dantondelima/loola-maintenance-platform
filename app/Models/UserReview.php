<?php

declare(strict_types=1);

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

    protected $casts = [
        'is_done' => 'boolean',
        'is_visible' => 'boolean',
        'rating' => 'integer',
    ];

    public function reviewedUser()
    {
        return $this->belongsTo(User::class, 'reviewed_user_id');
    }

    public function reviewer()
    {
        return $this->belongsTo(User::class, 'reviewer_user_id');
    }

    // @TODO: Uncomment when ServiceOrder model is created
    public function serviceOrder()
    {
        // return $this->belongsTo(ServiceOrder::class);
    }
}
