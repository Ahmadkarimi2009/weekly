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
                'name' =>'Contact with partner/authority (meeting, workshop, presentation…)',
                'fields' => '[2,21,27]',
            ],
            [
                'name' =>'Moderated Socio-Cultural Dialogues',
                'fields' => '[1,9,10,11,12,26,19,27]',
            ],
            [
                'name' =>'Online Cultural Dialogues',
                'fields' => '[15,9,14,10,11,12,26,19,27]',
            ],
            [
                'name' =>'Thematic Events',
                'fields' => '[9,10,11,12,26,19,27]',
            ],
            [
                'name' =>'Online Events',
                'fields' => '[15,9,14,10,11,12,19,27]',
            ],
            [
                'name' =>'New Voluteers Joined',
                'fields' => '[9,10,11,12,26,19,27]',
            ],
            [
                'name' =>'Meeting With Volunteers',
                'fields' => '[9,10,11,12,26,19,27]',
            ],
            [
                'name' =>'New Care Givers',
                'fields' => '[9,10,11,12,26,19,27]',
            ],
            [
                'name' =>'Care Givers Training',
                'fields' => '[9,10,11,12,26,19,27]',
            ],
            [
                'name' =>'Support group held by Care Giver',
                'fields' => '[9,10,11,12,26,19,27]',
            ],
            [
                'name' =>'Number of teachers recruited for training',
                'fields' => '[9,10,11,12,26,19,27]',
            ],
            [
                'name' =>'Teacher trainings',
                'fields' => '[9,10,11,12,26,19,27]',
            ],
            [
                'name' =>'Support groups (PSC)',
                'fields' => '[3,10,11,12,26,19,27]',
            ],
            [
                'name' =>'Life Skills Group (PSCW)',
                'fields' => '[3,10,11,12,26,19,27]',
            ],
            [
                'name' =>'Online Counseling Sessions',
                'fields' => '[14,10,11,12,26,19,27]',
            ]
        ];
        EventType::insert($fields);
    }
}
