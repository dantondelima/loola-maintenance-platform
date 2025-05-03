<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ServiceCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Plumbing',
            'Electrical',
            'HVAC',
            'Appliance Repair',
            'Painting',
            'Carpentry',
            'Roofing',
            'Landscaping',
            'Cleaning',
            'Pest Control',
            'Locksmith',
            'General Handyman',
            'Flooring',
            'Masonry',
            'Glass & Windows',
            'Gutter Services',
            'Security Systems',
            'Drywall & Insulation',
            'Remodeling & Renovation',
            'Snow Removal',
        ];

        DB::table('service_categories')->insert(
            collect($categories)->map(fn ($name) => [
                'name' => $name,
                'slug' => Str::slug($name),
                'created_at' => now(),
                'updated_at' => now(),
            ])->toArray()
        );
    }
}
