<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fields;

class FieldsSeeder extends Seeder
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
                'name' =>'Province',
                'table_name' => 'provinces',
                'machine_name' => 'province',
                'data_type' => 'selectbox'
            ],
            [
                'name' =>'Topic',
                'table_name' => 'topics',
                'machine_name' => 'topic',
                'data_type' => 'selectbox'
            ],
            [
                'name' =>'Number of Male',
                'table_name' => '',
                'machine_name' => 'number_of_male',
                'data_type' => 'number'
            ],
            [
                'name' =>'Number of Female',
                'table_name' => '',
                'machine_name' => 'number_of_female',
                'data_type' => 'number'
            ],
            [
                'name' =>'Total',
                'table_name' => '',
                'machine_name' => 'total',
                'data_type' => 'number'
            ],
            [
                'name' =>'Number of Groups',
                'table_name' => '',
                'machine_name' => 'number_of_groups',
                'data_type' => 'number'
            ],
            [
                'name' =>'Number of Session',
                'table_name' => '',
                'machine_name' => 'number_of_session',
                'data_type' => 'number'
            ],
            [
                'name' =>'With Province',
                'table_name' => 'provinces',
                'machine_name' => 'with_province',
                'data_type' => 'selectbox'
            ],
            [
                'name' =>'Location',
                'table_name' => '',
                'machine_name' => 'location',
                'data_type' => 'text'
            ],
            [
                'name' =>'Date of Trip',
                'table_name' => '',
                'machine_name' => 'date_of_trip',
                'data_type' => 'date'
            ],
            [
                'name' =>'Supervisor',
                'table_name' => '',
                'machine_name' => 'supervisor',
                'data_type' => 'text'
            ],
            [
                'name' =>'Reports',
                'table_name' => '',
                'machine_name' => 'reports',
                'data_type' => 'text'
            ],
            [
                'name' =>'Stakeholder',
                'table_name' => '',
                'machine_name' => 'stakeholder',
                'data_type' => 'text'
            ],
            [
                'name' =>'Activity',
                'table_name' => '',
                'machine_name' => 'activity',
                'data_type' => 'text'
            ],
        ];

        Fields::insert($fields);
    }
}
