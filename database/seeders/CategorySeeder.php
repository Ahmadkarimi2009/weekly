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
                'parent' => null
            ],
            [
                'name' => 'files',
                'parent' => null
            ],
            [
                'name' => 'children',
                'parent' => 1,
            ],
            [
                'name' => 'conference',
                'parent' => 1,
            ],
            [
                'name' => 'Weekly Reports',
                'parent' => 2
            ],
            [
                'name' => 'Monthly Reports',
                'parent' => 2
            ],
            [
                'name' => 'Banners',
                'parent' => 2
            ],
            [
                'name' => 'Brochures',
                'parent' => 2
            ],
            [
                'name' => 'MoU',
                'parent' => 2
            ],
            [
                'name' => 'training',
                'parent' => 2
            ]
        ];

        Category::insert($categories);
    }
}
