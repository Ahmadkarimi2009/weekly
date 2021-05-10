<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EventType;

class EventTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fields = [
            [
                'name' =>'Networking',
                'fields' => '[1,13,14]',
            ],
            [
                'name' =>'Cultural Dialogue',
                'fields' => '[1,2,3,4,5,6,9]',
            ],
            [
                'name' =>'Online Cultural Dialogue',
                'fields' => '[1,2,3,4,5,6,8]',
            ]
        ];
        EventType::insert($fields);
    }
}
