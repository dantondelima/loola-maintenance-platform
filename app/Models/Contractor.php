<?php

namespace App\Models;

use App\Enums\ContractorTypeEnum;
use Spatie\ModelStates\HasStates;
use Illuminate\Database\Eloquent\Model;
use App\States\Contractor\ContractorState;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
        'birth_date' => 'datetime',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function serviceCategories(): BelongsToMany
    {
        return $this->belongsToMany(ServiceCategory::class, 'contractor_service_categories');
    }
}
