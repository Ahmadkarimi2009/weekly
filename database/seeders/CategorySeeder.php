<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'images',
                'parent' => 'yes'
            ],
            [
                'name' => 'files',
                'parent' => 'yes'
            ],
            [
                'name' => 'videos',
                'parent' => 'yes'
            ],
            [
                'name' => 'children',
                'parent' => 'no',
            ],
            [
                'name' => 'conference',
                'parent' => 'no',
            ],
            [
                'name' => 'weekly reports',
                'parent' => 'no'
            ],
            [
                'name' => 'monthly reports',
                'parent' => 'no'
            ],
            [
                'name' => 'banners',
                'parent' => 'no'
            ],
            [
                'name' => 'brochures',
                'parent' => 'no'
            ],
            [
                'name' => 'mou',
                'parent' => 'no'
            ],
            [
                'name' => 'training',
                'parent' => 'no'
            ]
        ];

        Category::insert($categories);
    }
}
