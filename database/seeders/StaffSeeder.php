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
            ],
            [
                'name' => 'Naim Karimi',
                'father_name' => 'Hassan',
                'gender' => 'Male',
                'province' => 'Ghazni',
                'district' => 'Jaghori',
                'date_of_employment' => '2013-05-01',
                'position' => 'Technical Supervisor',
                'ipso_id' => '183'
            ],[
                'name' => 'Samiullah Totakhil',
                'father_name' => 'Zmarai',
                'gender' => 'Male',
                'province' => 'Paktia',
                'district' => '',
                'date_of_employment' => '2013-09-03',
                'position' => 'Project Coordinator',
                'ipso_id' => '023'
            ]
        ];

        Staff::insert($staff);

    }
}
