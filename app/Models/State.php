<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'states';

    protected $fillable = [
        'name',
        'code',
        'country_id',
    ];

    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
