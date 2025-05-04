<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\ServiceCategory;
use Illuminate\Database\Seeder;
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

        foreach ($categories as $category) {
            ServiceCategory::firstOrCreate([
                'name' => $category,
                'slug' => Str::slug($category),
            ]);
        }
    }
}
