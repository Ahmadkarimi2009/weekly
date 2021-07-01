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
                'name' => 'children',
                'parent' => 1,
            ],
            [
                'name' => 'conference',
                'parent' => 1,
            ],
            [
                'name' => 'Files',
                'parent' => null
            ]
        ];

        Category::insert($categories);
    }
}
