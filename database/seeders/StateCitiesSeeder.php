<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Country;
use App\Models\State;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use RuntimeException;

class StateCitiesSeeder extends Seeder
{
    public function run(): void
    {
        $brazil = Country::where('code', 'BR')->firstOrFail();
        $unitedStates = Country::where('code', 'US')->firstOrFail();

        $this->seedStatesAndCities(database_path('br_states_and_cities.json'), $brazil->id);
        $this->seedStatesAndCities(database_path('us_states_and_cities.json'), $unitedStates->id);
    }

    private function seedStatesAndCities(string $path, int $countryId): void
    {
        $json = File::get($path);
        $statesAndCities = json_decode($json, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new RuntimeException('Invalid JSON format');
        }

        DB::transaction(function () use ($statesAndCities, $countryId) {
            foreach ($statesAndCities as $stateData) {
                $state = State::firstOrCreate([
                    'name' => $stateData['name'],
                    'code' => $stateData['code'],
                    'country_id' => $countryId,
                ]);

                $cities = array_map(fn ($city) => ['name' => $city], $stateData['cities']);
                foreach ($cities as $cityData) {
                    $state->cities()->firstOrCreate(['name' => $cityData['name']]);
                }
            }
        });

        $this->command->info('States and cities seeded successfully.');
    }
}
