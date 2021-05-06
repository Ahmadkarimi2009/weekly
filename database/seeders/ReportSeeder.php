<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Report;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reports = [
            [
                'number_of_male' => 4,
                'number_of_female' => 6,
                'week' => 2,
                'month' => 4,
                'year' => 2021,
                'indirect_benificiaries' => 70,
                'province' => 1,
                'topic' => 2
            ],
            [
                'number_of_male' => 7,
                'number_of_female' => 8,
                'week' => 2,
                'month' => 4,
                'year' => 2021,
                'indirect_benificiaries' => 125,
                'province' => 2,
                'topic' => 2
            ],
            [
                'number_of_male' => 17,
                'number_of_female' => 18,
                'week' => 2,
                'month' => 4,
                'year' => 2021,
                'indirect_benificiaries' => 425,
                'province' => 3,
                'topic' => 2
            ]
            ];

        Report::insert($reports);
    }
}
