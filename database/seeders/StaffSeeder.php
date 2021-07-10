<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Staff;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $staff = [
            [
                'name' => 'Ahmad Karimi',
                'father_name' => 'Nasir Ali',
                'gender' => 'Male',
                'province' => 'Ghazni',
                'district' => 'Jaghori',
                'date_of_employment' => '2021-05-01',
                'position' => 'Documentation Officer/IT',
                'ipso_id' => '335'
            ]
        ];

        Staff::insert($staff);

    }
}
