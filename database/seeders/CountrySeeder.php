<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('countries')->insert([
            [
                'name' => 'Brazil',
                'code' => 'BR',
            ],
            [
                'name' => 'United States',
                'code' => 'US',
            ],
        ]);
    }
}
