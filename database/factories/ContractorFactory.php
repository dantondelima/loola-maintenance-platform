<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Contractor;
use App\Models\User;
use App\States\Contractor\ContractorState;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContractorFactory extends Factory
{
    protected $model = Contractor::class;

    public function definition(): array
    {
        $status = ContractorState::all()->random();

        return [
            'user_id' => User::factory(),
            'name' => $this->faker->name(),
            'document' => $this->faker->unique()->numerify('###########'),
            'birth_date' => $this->faker->dateTimeBetween('-30 years', '-18 years'),
            'status' => $status,
        ];
    }
}
