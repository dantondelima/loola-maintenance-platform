<?php

declare(strict_types=1);

namespace App\Models;

use App\States\Contractor\ContractorState;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\ModelStates\HasStates;

class Contractor extends Model
{
    use HasFactory, HasStates, HasUlids;

    protected $table = 'contractors';

    protected $fillable = [
        'user_id',
        'name',
        'document',
        'birth_date',
        'status',
    ];

    protected $casts = [
        'user_id' => 'ulid',
        'status' => ContractorState::class,
        'name' => 'encrypted',
        'document' => 'encrypted',
        'birth_date' => 'encrypted',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function serviceCategories(): BelongsToMany
    {
        return $this->belongsToMany(ServiceCategory::class, 'contractor_service_categories');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
