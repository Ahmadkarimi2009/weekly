<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Topic;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $topics = [
            [
                'name' => 'Descrimination',
                'type' => 'group'
            ],
            [
                'name' => 'Family Violence',
                'type' => 'group'
            ],
            [
                'name' => 'Gender Equality',
                'type' => 'individual'
            ]
        ];

        Topic::insert($topics);
    }
}
