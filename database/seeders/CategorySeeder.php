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
                'name' => 'Weekly Reports',
                'parent' => 'no'
            ],
            [
                'name' => 'Monthly Reports',
                'parent' => 'no'
            ],
            [
                'name' => 'Banners',
                'parent' => 'no'
            ],
            [
                'name' => 'Brochures',
                'parent' => 'no'
            ],
            [
                'name' => 'MoU',
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
