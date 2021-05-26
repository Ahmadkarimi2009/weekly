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
                'week' => 2,
                'month' => 4,
                'year' => 2021,
                'province' => 1,
            ],
            [
                'week' => 2,
                'month' => 4,
                'year' => 2021,
                'province' => 2,
            ],
            [
                'week' => 2,
                'month' => 4,
                'year' => 2021,
                'province' => 3,
            ]
            ];

        Report::insert($reports);
    }
}
