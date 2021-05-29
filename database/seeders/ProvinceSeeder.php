<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Province;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provinces = [
            ['name' =>'Kabul'],
            ['name' =>'Laghman'],
            ['name' =>'Jawzjan'],
            ['name' =>'Balkh'],
            ['name' =>'Kandahar'],
            ['name' =>'Nangarhar'],
            ['name' =>'Badakhshan'],
            ['name' =>'Bamyan'],
            ['name' =>'Herat'],
            ['name' =>'Kapisa']
        ];

        Province::insert($provinces);
    }
}
