<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\ServiceCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceCategoryFactory extends Factory
{
    protected $model = ServiceCategory::class;

    public function definition(): array
    {
        $name = $this->faker->word();

        return [
            'name' => $this->faker->word(),
            'slug' => Str::slug($name),
        ];
    }
}
