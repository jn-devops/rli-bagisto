<?php

namespace Webkul\Enclaves\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

// Path: php artisan db:seed --class="Webkul\\Enclaves\\Database\\Seeders\\CustomerAttributeAndOptions"

class CustomerAttributeAndOptions extends Seeder
{
    public function run()
    {
        DB::table('customer_attributes')->delete();

        DB::table('customer_attribute_options')->delete();

        $currentDateTime = now();

        DB::table('customer_attributes')->insert([
            /**
             *  ------------------ Personal Details ------------------
             */
            [
                'id'          => 1,
                'code'        => 'full_name',
                'name'        => 'Full Name',
                'type'        => 'text',
                'form_type'   => 'personal_details',
                'position'    => 1,
                'is_required' => 0,
                'created_at'  => $currentDateTime,
                'updated_at'  => $currentDateTime,
            ], [
                'id'          => 2,
                'code'        => 'dob',
                'name'        => 'Date of Birth',
                'type'        => 'date',
                'form_type'   => 'personal_details',
                'position'    => 1,
                'is_required' => 0,
                'created_at'  => $currentDateTime,
                'updated_at'  => $currentDateTime,
            ], [
                'id'          => 3,
                'code'        => 'email',
                'name'        => 'Email',
                'type'        => 'text',
                'form_type'   => 'personal_details',
                'position'    => 1,
                'is_required' => 0,
                'created_at'  => $currentDateTime,
                'updated_at'  => $currentDateTime,
            ], [
                'id'          => 4,
                'code'        => 'phone',
                'name'        => 'Phone',
                'type'        => 'text',
                'form_type'   => 'personal_details',
                'position'    => 1,
                'is_required' => 0,
                'created_at'  => $currentDateTime,
                'updated_at'  => $currentDateTime,
            ], [
                'id'          => 5,
                'code'        => 'lot_unit_number',
                'name'        => 'Lot / Unit number',
                'type'        => 'text',
                'form_type'   => 'personal_details',
                'position'    => 1,
                'is_required' => 0,
                'created_at'  => $currentDateTime,
                'updated_at'  => $currentDateTime,
            ], [
                'id'          => 6,
                'code'        => 'civil_status',
                'name'        => 'Civil Status',
                'type'        => 'select',
                'form_type'   => 'personal_details',
                'position'    => 1,
                'is_required' => 0,
                'created_at'  => $currentDateTime,
                'updated_at'  => $currentDateTime,
            ], [
                'id'          => 7,
                'code'        => 'gender',
                'name'        => 'Gender',
                'type'        => 'checkbox',
                'form_type'   => 'personal_details',
                'position'    => 1,
                'is_required' => 0,
                'created_at'  => $currentDateTime,
                'updated_at'  => $currentDateTime,
            ], [
                'id'          => 8,
                'code'        => 'address_1',
                'name'        => 'Address 1',
                'type'        => 'text',
                'form_type'   => 'personal_details',
                'position'    => 1,
                'is_required' => 0,
                'created_at'  => $currentDateTime,
                'updated_at'  => $currentDateTime,
            ],
            /**
             *  ------------- Employment Type -------------
             */
            [
                'id'          => 9,
                'code'        => 'employment_type',
                'name'        => 'Employment Type',
                'type'        => 'select',
                'form_type'   => 'employment_type',
                'position'    => 1,
                'is_required' => 0,
                'created_at'  => $currentDateTime,
                'updated_at'  => $currentDateTime,
            ], [
                'id'          => 10,
                'code'        => 'gross_income',
                'name'        => 'Gross Income',
                'type'        => 'text',
                'form_type'   => 'employment_type',
                'position'    => 1,
                'is_required' => 0,
                'created_at'  => $currentDateTime,
                'updated_at'  => $currentDateTime,
            ], [
                'id'          => 11,
                'code'        => 'nationality',
                'name'        => 'Nationality',
                'type'        => 'text',
                'form_type'   => 'employment_type',
                'position'    => 1,
                'is_required' => 0,
                'created_at'  => $currentDateTime,
                'updated_at'  => $currentDateTime,
            ], [
                'id'          => 12,
                'code'        => 'work_industry',
                'name'        => 'Work Industry',
                'type'        => 'select',
                'form_type'   => 'employment_type',
                'position'    => 1,
                'is_required' => 0,
                'created_at'  => $currentDateTime,
                'updated_at'  => $currentDateTime,
            ], [
                'id'          => 13,
                'code'        => 'employment_status',
                'name'        => 'Employment Status',
                'type'        => 'select',
                'form_type'   => 'employment_type',
                'position'    => 1,
                'is_required' => 0,
                'created_at'  => $currentDateTime,
                'updated_at'  => $currentDateTime,
            ], [
                'id'          => 14,
                'code'        => 'current_position',
                'name'        => 'Current Position',
                'type'        => 'text',
                'form_type'   => 'employment_type',
                'position'    => 1,
                'is_required' => 0,
                'created_at'  => $currentDateTime,
                'updated_at'  => $currentDateTime,
            ], [
                'id'          => 15,
                'code'        => 'employer_name',
                'name'        => 'Employer Name',
                'type'        => 'text',
                'form_type'   => 'employment_type',
                'position'    => 1,
                'is_required' => 0,
                'created_at'  => $currentDateTime,
                'updated_at'  => $currentDateTime,
            ], [
                'id'          => 16,
                'code'        => 'employer_contact_number',
                'name'        => 'Employer Contact Number',
                'type'        => 'text',
                'form_type'   => 'employment_type',
                'position'    => 1,
                'is_required' => 0,
                'created_at'  => $currentDateTime,
                'updated_at'  => $currentDateTime,
            ], [
                'id'          => 17,
                'code'        => 'employer_address',
                'name'        => 'Employer Address',
                'type'        => 'text',
                'form_type'   => 'employment_type',
                'position'    => 1,
                'is_required' => 0,
                'created_at'  => $currentDateTime,
                'updated_at'  => $currentDateTime,
            ], [
                'id'          => 18,
                'code'        => 'tax_identification_number',
                'name'        => 'Tax Identification Number',
                'type'        => 'text',
                'form_type'   => 'employment_type',
                'position'    => 1,
                'is_required' => 0,
                'created_at'  => $currentDateTime,
                'updated_at'  => $currentDateTime,
            ], [
                'id'          => 19,
                'code'        => 'PAG_IBIG_number',
                'name'        => 'PAG IBIG Number',
                'type'        => 'text',
                'form_type'   => 'employment_type',
                'position'    => 1,
                'is_required' => 0,
                'created_at'  => $currentDateTime,
                'updated_at'  => $currentDateTime,
            ], [
                'id'          => 20,
                'code'        => 'SSS_GSIS_number',
                'name'        => 'SSS-GSIS Number',
                'type'        => 'text',
                'form_type'   => 'employment_type',
                'position'    => 1,
                'is_required' => 0,
                'created_at'  => $currentDateTime,
                'updated_at'  => $currentDateTime,
            ],

            /**
             *  ------------- Borrower's Data -------------
             */
            [
                'id'          => 21,
                'code'        => 'secondary_home_address',
                'name'        => 'Secondary Home Address',
                'type'        => 'text',
                'form_type'   => 'borrower_data',
                'position'    => 1,
                'is_required' => 0,
                'created_at'  => $currentDateTime,
                'updated_at'  => $currentDateTime,
            ], [
                'id'          => 22,
                'code'        => 'civil_status',
                'name'        => 'Civil Status',
                'type'        => 'select',
                'form_type'   => 'borrower_data',
                'position'    => 1,
                'is_required' => 0,
                'created_at'  => $currentDateTime,
                'updated_at'  => $currentDateTime,
            ], [
                'id'          => 23,
                'code'        => 'gender',
                'name'        => 'Gender',
                'type'        => 'checkbox',
                'form_type'   => 'borrower_data',
                'position'    => 1,
                'is_required' => 0,
                'created_at'  => $currentDateTime,
                'updated_at'  => $currentDateTime,
            ], [
                'id'          => 24,
                'code'        => 'dob',
                'name'        => 'Date of Birth',
                'type'        => 'date',
                'form_type'   => 'borrower_data',
                'position'    => 1,
                'is_required' => 0,
                'created_at'  => $currentDateTime,
                'updated_at'  => $currentDateTime,
            ], [
                'id'          => 25,
                'code'        => 'primary_email_address',
                'name'        => 'Primary Email Address',
                'type'        => 'text',
                'form_type'   => 'borrower_data',
                'position'    => 1,
                'is_required' => 0,
                'created_at'  => $currentDateTime,
                'updated_at'  => $currentDateTime,
            ], [
                'id'          => 26,
                'code'        => 'primary_mobile_number',
                'name'        => 'Primary Mobile Number',
                'type'        => 'text',
                'form_type'   => 'borrower_data',
                'position'    => 1,
                'is_required' => 0,
                'created_at'  => $currentDateTime,
                'updated_at'  => $currentDateTime,
            ], [
                'id'          => 27,
                'code'        => 'work_industry',
                'name'        => 'Work Industry',
                'type'        => 'select',
                'form_type'   => 'borrower_data',
                'position'    => 1,
                'is_required' => 0,
                'created_at'  => $currentDateTime,
                'updated_at'  => $currentDateTime,
            ], [
                'id'          => 28,
                'code'        => 'gross_income',
                'name'        => 'Gross Income',
                'type'        => 'text',
                'form_type'   => 'borrower_data',
                'position'    => 1,
                'is_required' => 0,
                'created_at'  => $currentDateTime,
                'updated_at'  => $currentDateTime,
            ], [
                'id'          => 29,
                'code'        => 'nationality',
                'name'        => 'Nationality',
                'type'        => 'text',
                'form_type'   => 'borrower_data',
                'position'    => 1,
                'is_required' => 0,
                'created_at'  => $currentDateTime,
                'updated_at'  => $currentDateTime,
            ], [
                'id'          => 30,
                'code'        => 'employment_type',
                'name'        => 'Employment Type',
                'type'        => 'select',
                'form_type'   => 'borrower_data',
                'position'    => 1,
                'is_required' => 0,
                'created_at'  => $currentDateTime,
                'updated_at'  => $currentDateTime,
            ], [
                'id'          => 31,
                'code'        => 'employment_status',
                'name'        => 'Employment Status',
                'type'        => 'select',
                'form_type'   => 'borrower_data',
                'position'    => 1,
                'is_required' => 0,
                'created_at'  => $currentDateTime,
                'updated_at'  => $currentDateTime,
            ], [
                'id'          => 32,
                'code'        => 'current_position',
                'name'        => 'Current Position',
                'type'        => 'text',
                'form_type'   => 'borrower_data',
                'position'    => 1,
                'is_required' => 0,
                'created_at'  => $currentDateTime,
                'updated_at'  => $currentDateTime,
            ], [
                'id'          => 33,
                'code'        => 'employer_name',
                'name'        => 'Employer Name',
                'type'        => 'text',
                'form_type'   => 'borrower_data',
                'position'    => 1,
                'is_required' => 0,
                'created_at'  => $currentDateTime,
                'updated_at'  => $currentDateTime,
            ], [
                'id'          => 34,
                'code'        => 'employer_contact_number',
                'name'        => 'Employer Contact Number',
                'type'        => 'text',
                'form_type'   => 'borrower_data',
                'position'    => 1,
                'is_required' => 0,
                'created_at'  => $currentDateTime,
                'updated_at'  => $currentDateTime,
            ], [
                'id'          => 35,
                'code'        => 'employer_address',
                'name'        => 'Employer Address',
                'type'        => 'text',
                'form_type'   => 'borrower_data',
                'position'    => 1,
                'is_required' => 0,
                'created_at'  => $currentDateTime,
                'updated_at'  => $currentDateTime,
            ], [
                'id'          => 36,
                'code'        => 'tax_identification_number',
                'name'        => 'Tax Identification Number',
                'type'        => 'text',
                'form_type'   => 'borrower_data',
                'position'    => 1,
                'is_required' => 0,
                'created_at'  => $currentDateTime,
                'updated_at'  => $currentDateTime,
            ], [
                'id'          => 37,
                'code'        => 'PAG_IBIG_number',
                'name'        => 'PAG IBIG Number',
                'type'        => 'text',
                'form_type'   => 'borrower_data',
                'position'    => 1,
                'is_required' => 0,
                'created_at'  => $currentDateTime,
                'updated_at'  => $currentDateTime,
            ], [
                'id'          => 38,
                'code'        => 'SSS_GSIS_number',
                'name'        => 'SSS GSIS Number',
                'type'        => 'text',
                'form_type'   => 'borrower_data',
                'position'    => 1,
                'is_required' => 0,
                'created_at'  => $currentDateTime,
                'updated_at'  => $currentDateTime,
            ],
        ]);

        DB::table('customer_attribute_options')->insert([
            [
                'customer_attribute_id' => 6, // Civil Status
                'value'                 => 'option 1',
                'created_at'            => $currentDateTime,
                'updated_at'            => $currentDateTime,
            ], [
                'customer_attribute_id' => 6, // Civil Status
                'value'                 => 'option 2',
                'created_at'            => $currentDateTime,
                'updated_at'            => $currentDateTime,
            ], [
                'customer_attribute_id' => 6, // Civil Status
                'value'                 => 'option 3',
                'created_at'            => $currentDateTime,
                'updated_at'            => $currentDateTime,
            ], [
                'customer_attribute_id' => 7, // Gender
                'value'                 => 'Male',
                'created_at'            => $currentDateTime,
                'updated_at'            => $currentDateTime,
            ], [
                'customer_attribute_id' => 7, // Gender
                'value'                 => 'Female',
                'created_at'            => $currentDateTime,
                'updated_at'            => $currentDateTime,
            ], [
                'customer_attribute_id' => 7, // Gender
                'value'                 => 'Other',
                'created_at'            => $currentDateTime,
                'updated_at'            => $currentDateTime,
            ], [
                'customer_attribute_id' => 9, // Employment Type
                'value'                 => 'option 1',
                'created_at'            => $currentDateTime,
                'updated_at'            => $currentDateTime,
            ], [
                'customer_attribute_id' => 9, // Employment Type
                'value'                 => 'option 2',
                'created_at'            => $currentDateTime,
                'updated_at'            => $currentDateTime,
            ], [
                'customer_attribute_id' => 9, // Employment Type
                'value'                 => 'option 3',
                'created_at'            => $currentDateTime,
                'updated_at'            => $currentDateTime,
            ], [
                'customer_attribute_id' => 12, // Work Industry
                'value'                 => 'option 1',
                'created_at'            => $currentDateTime,
                'updated_at'            => $currentDateTime,
            ], [
                'customer_attribute_id' => 12, // Work Industry
                'value'                 => 'option 2',
                'created_at'            => $currentDateTime,
                'updated_at'            => $currentDateTime,
            ], [
                'customer_attribute_id' => 12, // Work Industry
                'value'                 => 'option 3',
                'created_at'            => $currentDateTime,
                'updated_at'            => $currentDateTime,
            ], [
                'customer_attribute_id' => 13, // Employment Status
                'value'                 => 'option 1',
                'created_at'            => $currentDateTime,
                'updated_at'            => $currentDateTime,
            ], [
                'customer_attribute_id' => 13, // Employment Status
                'value'                 => 'option 2',
                'created_at'            => $currentDateTime,
                'updated_at'            => $currentDateTime,
            ], [
                'customer_attribute_id' => 13, // Employment Status
                'value'                 => 'option 3',
                'created_at'            => $currentDateTime,
                'updated_at'            => $currentDateTime,
            ], [
                'customer_attribute_id' => 22, // Civil Status
                'value'                 => 'option 1',
                'created_at'            => $currentDateTime,
                'updated_at'            => $currentDateTime,
            ], [
                'customer_attribute_id' => 22, // Civil Status
                'value'                 => 'option 2',
                'created_at'            => $currentDateTime,
                'updated_at'            => $currentDateTime,
            ], [
                'customer_attribute_id' => 22, // Civil Status
                'value'                 => 'option 3',
                'created_at'            => $currentDateTime,
                'updated_at'            => $currentDateTime,
            ],  [
                'customer_attribute_id' => 23, // Gender
                'value'                 => 'Male',
                'created_at'            => $currentDateTime,
                'updated_at'            => $currentDateTime,
            ], [
                'customer_attribute_id' => 23, // Gender
                'value'                 => 'Female',
                'created_at'            => $currentDateTime,
                'updated_at'            => $currentDateTime,
            ], [
                'customer_attribute_id' => 23, // Gender
                'value'                 => 'Other',
                'created_at'            => $currentDateTime,
                'updated_at'            => $currentDateTime,
            ], [
                'customer_attribute_id' => 27, // Work Industry
                'value'                 => 'option 1',
                'created_at'            => $currentDateTime,
                'updated_at'            => $currentDateTime,
            ], [
                'customer_attribute_id' => 27, // Work Industry
                'value'                 => 'option 2',
                'created_at'            => $currentDateTime,
                'updated_at'            => $currentDateTime,
            ], [
                'customer_attribute_id' => 27, // Work Industry
                'value'                 => 'option 3',
                'created_at'            => $currentDateTime,
                'updated_at'            => $currentDateTime,
            ], [
                'customer_attribute_id' => 30, // Employment Type
                'value'                 => 'option 1',
                'created_at'            => $currentDateTime,
                'updated_at'            => $currentDateTime,
            ], [
                'customer_attribute_id' => 30, // Employment Type
                'value'                 => 'option 2',
                'created_at'            => $currentDateTime,
                'updated_at'            => $currentDateTime,
            ], [
                'customer_attribute_id' => 30, // Employment Type
                'value'                 => 'option 3',
                'created_at'            => $currentDateTime,
                'updated_at'            => $currentDateTime,
            ], [
                'customer_attribute_id' => 31, // Employment Status
                'value'                 => 'option 1',
                'created_at'            => $currentDateTime,
                'updated_at'            => $currentDateTime,
            ], [
                'customer_attribute_id' => 31, // Employment Status
                'value'                 => 'option 2',
                'created_at'            => $currentDateTime,
                'updated_at'            => $currentDateTime,
            ], [
                'customer_attribute_id' => 31, // Employment Status
                'value'                 => 'option 3',
                'created_at'            => $currentDateTime,
                'updated_at'            => $currentDateTime,
            ],
        ]);
    }
}
