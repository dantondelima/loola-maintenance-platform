<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Country;
use App\Models\State;
use Illuminate\Database\Eloquent\Factories\Factory;

class StateFactory extends Factory
{
    protected $model = State::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->state(),
            'code' => $this->faker->stateAbbr(),
            'country_id' => Country::factory(),
        ];
    }
}
