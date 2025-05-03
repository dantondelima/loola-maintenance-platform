<?php

namespace App\Models;

use App\Enums\ContractorTypeEnum;
use App\States\Contractor\ContractorState;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\ModelStates\HasStates;

class Contractor extends Model
{
    use HasFactory, HasStates, HasUlids;

    protected $table = 'contractors';

    protected $fillable = [
        'user_id',
        'name',
        'document',
        'type',
        'birth_date',
        'status',
    ];

    protected $casts = [
        'user_id' => 'ulid',
        'status' => ContractorState::class,
        'type' => ContractorTypeEnum::class,
        'birth_date' => 'datetime',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
