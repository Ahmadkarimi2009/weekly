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
                'name' => 'In SCC or Field',
                'table_name' => '',
                'machine_name' => 'in_scc_or_field',
                'data_type' => 'checkbox',
                'searchable' => 'true',
                'display_in_specific_report' => 'false'
            ],
            [
                'name' => 'Partner/Authority',
                'table_name' => '',
                'machine_name' => 'partner_authority',
                'data_type' => 'text',
                'searchable' => 'true',
                'display_in_specific_report' => 'true'

            ],
            [
                'name' => 'Group Topic',
                'table_name' => '',
                'machine_name' => 'group_topic',
                'data_type' => 'text',
                'searchable' => 'true',
                'display_in_specific_report' => 'true'

            ],
            [
                'name' => 'Male Beneficiaries',
                'table_name' => '',
                'machine_name' => 'male_beneficiaries',
                'data_type' => 'number',
                'searchable' => 'false',
                'display_in_specific_report' => 'false'

            ],
            [
                'name' => 'Female Beneficiaries',
                'table_name' => '',
                'machine_name' => 'female_eneficiaries',
                'data_type' => 'number',
                'searchable' => 'false',
                'display_in_specific_report' => 'false'

            ],
            [
                'name' => 'Total Beneficiaries',
                'table_name' => '',
                'machine_name' => 'total_eneficiaries',
                'data_type' => 'number',
                'searchable' => 'false',
                'display_in_specific_report' => 'true'

            ],
            [
                'name' => 'Project of male or female Young Leaders?',
                'table_name' => '',
                'machine_name' => 'project_of_male_or_female_young_leaders',
                'data_type' => 'text',
                'searchable' => 'false',
                'display_in_specific_report' => 'false'

            ],
            [
                'name' => 'Project of male or female volunteers?',
                'table_name' => '',
                'machine_name' => 'project_of_male_or_female_volunteers',
                'data_type' => 'text',
                'searchable' => 'false',
                'display_in_specific_report' => 'false'

            ],
            [
                'name' => 'Topic',
                'table_name' => '',
                'machine_name' => 'topic',
                'data_type' => 'text',
                'searchable' => 'true',
                'display_in_specific_report' => 'true'

            ],
            [
                'name' =>'Number of Male',
                'table_name' => '',
                'machine_name' => 'number_of_male',
                'data_type' => 'number',
                'searchable' => 'false',
                'display_in_specific_report' => 'true'

            ],
            [
                'name' =>'Number of Female',
                'table_name' => '',
                'machine_name' => 'number_of_female',
                'data_type' => 'number',
                'searchable' => 'false',
                'display_in_specific_report' => 'true'

            ],
            [
                'name' =>'Total',
                'table_name' => '',
                'machine_name' => 'total',
                'data_type' => 'number',
                'searchable' => 'false',
                'display_in_specific_report' => 'true'

            ],
            [
                'name' =>'Number of Groups',
                'table_name' => '',
                'machine_name' => 'number_of_groups',
                'data_type' => 'number',
                'searchable' => 'false',
                'display_in_specific_report' => 'true'

            ],
            [
                'name' =>'Number of Sessions',
                'table_name' => '',
                'machine_name' => 'number_of_sessions',
                'data_type' => 'number',
                'searchable' => 'false',
                'display_in_specific_report' => 'true'

            ],
            [
                'name' =>'With Province',
                'table_name' => 'provinces',
                'machine_name' => 'with_province',
                'data_type' => 'selectbox',
                'searchable' => 'true',
                'display_in_specific_report' => 'true'

            ],
            [
                'name' =>'Location',
                'table_name' => '',
                'machine_name' => 'location',
                'data_type' => 'text',
                'searchable' => 'true',
                'display_in_specific_report' => 'false'

            ],
            [
                'name' =>'Date of Trip',
                'table_name' => '',
                'machine_name' => 'date_of_trip',
                'data_type' => 'date',
                'searchable' => 'false',
                'display_in_specific_report' => 'false'

            ],
            [
                'name' =>'Supervisor',
                'table_name' => '',
                'machine_name' => 'supervisor',
                'data_type' => 'text',
                'searchable' => 'true',
                'display_in_specific_report' => 'false'

            ],
            [
                'name' =>'Details',
                'table_name' => '',
                'machine_name' => 'details',
                'data_type' => 'textarea',
                'searchable' => 'false',
                'display_in_specific_report' => 'false'

            ],
            [
                'name' =>'Stakeholder',
                'table_name' => '',
                'machine_name' => 'stakeholder',
                'data_type' => 'text',
                'searchable' => 'true',
                'display_in_specific_report' => 'true'

            ],
            [
                'name' =>'No. of online counseling sessions arranged in container',
                'table_name' => '',
                'machine_name' => 'no_of_online_counseling_sessions_arranged_in_container',
                'data_type' => 'number',
                'searchable' => 'false',
                'display_in_specific_report' => 'true'

            ],
            [
                'name' =>'No. of online counseling sessions',
                'table_name' => '',
                'machine_name' => 'no_of_online_counseling_sessions',
                'data_type' => 'number',
                'searchable' => 'false',
                'display_in_specific_report' => 'true'

            ],
            [
                'name' =>'No. of sessions for male clients',
                'table_name' => '',
                'machine_name' => 'no_of_sessions_for_male_clients',
                'data_type' => 'number',
                'searchable' => 'false',
                'display_in_specific_report' => 'true'

            ],
            [
                'name' =>'No. of sessions for female clients',
                'table_name' => '',
                'machine_name' => 'no_of_sessions_for_male_clients',
                'data_type' => 'number',
                'searchable' => 'false',
                'display_in_specific_report' => 'true'

            ],
            [
                'name' =>'Date',
                'table_name' => '',
                'machine_name' => 'date_of_activity',
                'data_type' => 'date',
                'searchable' => 'true',
                'display_in_specific_report' => 'false'
            ]
        ];

        Fields::insert($fields);
    }
}
