<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    public function run(): void
    {
        $countries = [
            [
                'name' => 'Brazil',
                'code' => 'BR',
            ],
            [
                'name' => 'United States',
                'code' => 'US',
            ],
        ];

        foreach ($countries as $country) {
            Country::firstOrCreate(
                ['code' => $country['code']],
                ['name' => $country['name']]
            );
        }
    }
}
