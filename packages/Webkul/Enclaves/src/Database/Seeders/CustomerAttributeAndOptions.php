<?php

namespace Webkul\Enclaves\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerAttributeAndOptions extends Seeder
{
    public function run()
    {
        DB::table('customer_attributes')->delete();

        DB::table('customer_attribute_options')->delete();

        $currectDateTime = now();

        DB::table('customer_attributes')->insert([
            /**
             *  ------------------ Personal Details ------------------
             */
            [
                'id'          => 1,
                'name'        => 'Civil Status',
                'type'        => 'select',
                'form_type'   => 'personal_details',
                'postion'     => 1,
                'is_required' => 0,
                'created_at'  => $currectDateTime,
                'updated_at'  => $currectDateTime,
            ], [
                'id'          => 2,
                'name'        => 'Gender',
                'type'        => 'checkbox',
                'form_type'   => 'personal_details',
                'postion'     => 1,
                'is_required' => 0,
                'created_at'  => $currectDateTime,
                'updated_at'  => $currectDateTime,
            ], [
                'id'          => 3,
                'name'        => 'Address 1',
                'type'        => 'text',
                'form_type'   => 'personal_details',
                'postion'     => 1,
                'is_required' => 0,
                'created_at'  => $currectDateTime,
                'updated_at'  => $currectDateTime,
            ],
            
            /**                     
             *  ------------- Employment Type -------------
             */
            [
                'id'          => 4,
                'name'        => 'Employment Type',
                'type'        => 'select',
                'form_type'   => 'employment_type',
                'postion'     => 1,
                'is_required' => 0,
                'created_at'  => $currectDateTime,
                'updated_at'  => $currectDateTime,
            ], [
                'id'          => 5,
                'name'        => 'Gross Income',
                'type'        => 'select',
                'form_type'   => 'employment_type',
                'postion'     => 1,
                'is_required' => 0,
                'created_at'  => $currectDateTime,
                'updated_at'  => $currectDateTime,
            ], [
                'id'          => 6,
                'name'        => 'Nationality',
                'type'        => 'select',
                'form_type'   => 'employment_type',
                'postion'     => 1,
                'is_required' => 0,
                'created_at'  => $currectDateTime,
                'updated_at'  => $currectDateTime,
            ], [
                'id'          => 7,
                'name'        => 'Work Industry',
                'type'        => 'select',
                'form_type'   => 'employment_type',
                'postion'     => 1,
                'is_required' => 0,
                'created_at'  => $currectDateTime,
                'updated_at'  => $currectDateTime,
            ], [
                'id'          => 8,
                'name'        => 'Employment Status',
                'type'        => 'select',
                'form_type'   => 'employment_type',
                'postion'     => 1,
                'is_required' => 0,
                'created_at'  => $currectDateTime,
                'updated_at'  => $currectDateTime,
            ], [
                'id'          => 9,
                'name'        => 'Current Position',
                'type'        => 'text',
                'form_type'   => 'employment_type',
                'postion'     => 1,
                'is_required' => 0,
                'created_at'  => $currectDateTime,
                'updated_at'  => $currectDateTime,
            ], [
                'id'          => 10,
                'name'        => 'Employer Name',
                'type'        => 'text',
                'form_type'   => 'employment_type',
                'postion'     => 1,
                'is_required' => 0,
                'created_at'  => $currectDateTime,
                'updated_at'  => $currectDateTime,
            ], [
                'id'          => 11,
                'name'        => 'Employer Contact Number',
                'type'        => 'text',
                'form_type'   => 'employment_type',
                'postion'     => 1,
                'is_required' => 0,
                'created_at'  => $currectDateTime,
                'updated_at'  => $currectDateTime,
            ], [
                'id'          => 12,
                'name'        => 'Employer Address',
                'type'        => 'text',
                'form_type'   => 'employment_type',
                'postion'     => 1,
                'is_required' => 0,
                'created_at'  => $currectDateTime,
                'updated_at'  => $currectDateTime,
            ], [
                'id'          => 13,
                'name'        => 'Tax Identification Number',
                'type'        => 'text',
                'form_type'   => 'employment_type',
                'postion'     => 1,
                'is_required' => 0,
                'created_at'  => $currectDateTime,
                'updated_at'  => $currectDateTime,
            ], [
                'id'          => 14,
                'name'        => 'PAG-IBIG Number',
                'type'        => 'text',
                'form_type'   => 'employment_type',
                'postion'     => 1,
                'is_required' => 0,
                'created_at'  => $currectDateTime,
                'updated_at'  => $currectDateTime,
            ], [
                'id'          => 15,
                'name'        => 'SSS/GSIS Number',
                'type'        => 'text',
                'form_type'   => 'employment_type',
                'postion'     => 1,
                'is_required' => 0,
                'created_at'  => $currectDateTime,
                'updated_at'  => $currectDateTime,
            ],
            
            /**                     
             *  ------------- Borrower's Data -------------
             */
            [
                'id'          => 16,
                'name'        => 'Secondary Home Address',
                'type'        => 'text',
                'form_type'   => 'borrower_data',
                'postion'     => 1,
                'is_required' => 0,
                'created_at'  => $currectDateTime,
                'updated_at'  => $currectDateTime,
            ], [
                'id'          => 17,
                'name'        => 'Civil Status',
                'type'        => 'select',
                'form_type'   => 'borrower_data',
                'postion'     => 1,
                'is_required' => 0,
                'created_at'  => $currectDateTime,
                'updated_at'  => $currectDateTime,
            ], [
                'id'          => 18,
                'name'        => 'Gender',
                'type'        => 'checkbox',
                'form_type'   => 'borrower_data',
                'postion'     => 1,
                'is_required' => 0,
                'created_at'  => $currectDateTime,
                'updated_at'  => $currectDateTime,
            ], [
                'id'          => 19,
                'name'        => 'Date of Birth',
                'type'        => 'select',
                'form_type'   => 'borrower_data',
                'postion'     => 1,
                'is_required' => 0,
                'created_at'  => $currectDateTime,
                'updated_at'  => $currectDateTime,
            ], [
                'id'          => 20,
                'name'        => 'Primary Email Address',
                'type'        => 'text',
                'form_type'   => 'borrower_data',
                'postion'     => 1,
                'is_required' => 0,
                'created_at'  => $currectDateTime,
                'updated_at'  => $currectDateTime,
            ], [
                'id'          => 21,
                'name'        => 'Primary Mobile Number',
                'type'        => 'text',
                'form_type'   => 'borrower_data',
                'postion'     => 1,
                'is_required' => 0,
                'created_at'  => $currectDateTime,
                'updated_at'  => $currectDateTime,
            ], [
                'id'          => 22,
                'name'        => 'Work Industry',
                'type'        => 'select',
                'form_type'   => 'borrower_data',
                'postion'     => 1,
                'is_required' => 0,
                'created_at'  => $currectDateTime,
                'updated_at'  => $currectDateTime,
            ], [
                'id'          => 23,
                'name'        => 'Gross Income',
                'type'        => 'text',
                'form_type'   => 'borrower_data',
                'postion'     => 1,
                'is_required' => 0,
                'created_at'  => $currectDateTime,
                'updated_at'  => $currectDateTime,
            ], [
                'id'          => 24,
                'name'        => 'Nationality',
                'type'        => 'select',
                'form_type'   => 'borrower_data',
                'postion'     => 1,
                'is_required' => 0,
                'created_at'  => $currectDateTime,
                'updated_at'  => $currectDateTime,
            ], [
                'id'          => 25,
                'name'        => 'Employment Type',
                'type'        => 'select',
                'form_type'   => 'borrower_data',
                'postion'     => 1,
                'is_required' => 0,
                'created_at'  => $currectDateTime,
                'updated_at'  => $currectDateTime,
            ], [
                'id'          => 26,
                'name'        => 'Employment Status',
                'type'        => 'select',
                'form_type'   => 'borrower_data',
                'postion'     => 1,
                'is_required' => 0,
                'created_at'  => $currectDateTime,
                'updated_at'  => $currectDateTime,
            ], [
                'id'          => 27,
                'name'        => 'Current Position',
                'type'        => 'text',
                'form_type'   => 'borrower_data',
                'postion'     => 1,
                'is_required' => 0,
                'created_at'  => $currectDateTime,
                'updated_at'  => $currectDateTime,
            ], [
                'id'          => 28,
                'name'        => 'Employer Name',
                'type'        => 'text',
                'form_type'   => 'borrower_data',
                'postion'     => 1,
                'is_required' => 0,
                'created_at'  => $currectDateTime,
                'updated_at'  => $currectDateTime,
            ], [
                'id'          => 29,
                'name'        => 'Employer Contact Number',
                'type'        => 'text',
                'form_type'   => 'borrower_data',
                'postion'     => 1,
                'is_required' => 0,
                'created_at'  => $currectDateTime,
                'updated_at'  => $currectDateTime,
            ], [
                'id'          => 30,
                'name'        => 'Employer Address',
                'type'        => 'text',
                'form_type'   => 'borrower_data',
                'postion'     => 1,
                'is_required' => 0,
                'created_at'  => $currectDateTime,
                'updated_at'  => $currectDateTime,
            ], [
                'id'          => 31,
                'name'        => 'Tax Identification Number',
                'type'        => 'text',
                'form_type'   => 'borrower_data',
                'postion'     => 1,
                'is_required' => 0,
                'created_at'  => $currectDateTime,
                'updated_at'  => $currectDateTime,
            ], [
                'id'          => 32,
                'name'        => 'PAG-IBIG Number',
                'type'        => 'text',
                'form_type'   => 'borrower_data',
                'postion'     => 1,
                'is_required' => 0,
                'created_at'  => $currectDateTime,
                'updated_at'  => $currectDateTime,
            ], [
                'id'          => 33,
                'name'        => 'SSS/GSIS Number',
                'type'        => 'text',
                'form_type'   => 'borrower_data',
                'postion'     => 1,
                'is_required' => 0,
                'created_at'  => $currectDateTime,
                'updated_at'  => $currectDateTime,
            ],
        ]);

        DB::table('customer_attribute_options')->insert([
            [
                'id'                    => 1,
                'customer_attribute_id' => 1, // Civil Status
                'value'                 => 'option 1',
                'created_at'            => $currectDateTime,
                'updated_at'            => $currectDateTime,
            ], [
                'id'                    => 2,
                'customer_attribute_id' => 1, // Civil Status
                'value'                 => 'option 2',
                'created_at'            => $currectDateTime,
                'updated_at'            => $currectDateTime,
            ], [
                'id'                    => 3,
                'customer_attribute_id' => 1, // Civil Status
                'value'                 => 'option 3',
                'created_at'            => $currectDateTime,
                'updated_at'            => $currectDateTime,
            ], [
                'id'                    => 4,
                'customer_attribute_id' => 2, // Gender
                'value'                 => 'Male',
                'created_at'            => $currectDateTime,
                'updated_at'            => $currectDateTime,
            ], [
                'id'                    => 5,
                'customer_attribute_id' => 2, // Gender
                'value'                 => 'Female',
                'created_at'            => $currectDateTime,
                'updated_at'            => $currectDateTime,
            ], [
                'id'                    => 6,
                'customer_attribute_id' => 2, // Gender
                'value'                 => 'Other',
                'created_at'            => $currectDateTime,
                'updated_at'            => $currectDateTime,
            ], [
                'id'                    => 7,
                'customer_attribute_id' => 4, // Employment Type
                'value'                 => 'option 1',
                'created_at'            => $currectDateTime,
                'updated_at'            => $currectDateTime,
            ], [
                'id'                    => 8,
                'customer_attribute_id' => 4, // Employment Type
                'value'                 => 'option 2',
                'created_at'            => $currectDateTime,
                'updated_at'            => $currectDateTime,
            ], [
                'id'                    => 9,
                'customer_attribute_id' => 4, // Employment Type
                'value'                 => 'option 3',
                'created_at'            => $currectDateTime,
                'updated_at'            => $currectDateTime,
            ], [
                'id'                    => 10,
                'customer_attribute_id' => 5, // Gross Income
                'value'                 => 'option 1',
                'created_at'            => $currectDateTime,
                'updated_at'            => $currectDateTime,
            ], [
                'id'                    => 11,
                'customer_attribute_id' => 5, // Gross Income
                'value'                 => 'option 2',
                'created_at'            => $currectDateTime,
                'updated_at'            => $currectDateTime,
            ], [
                'id'                    => 12,
                'customer_attribute_id' => 5, // Gross Income
                'value'                 => 'option 3',
                'created_at'            => $currectDateTime,
                'updated_at'            => $currectDateTime,
            ], [
                'id'                    => 13,
                'customer_attribute_id' => 6, // Nationality
                'value'                 => 'option 1',
                'created_at'            => $currectDateTime,
                'updated_at'            => $currectDateTime,
            ], [
                'id'                    => 14,
                'customer_attribute_id' => 6, // Nationality
                'value'                 => 'option 2',
                'created_at'            => $currectDateTime,
                'updated_at'            => $currectDateTime,
            ], [
                'id'                    => 15,
                'customer_attribute_id' => 6, // Nationality
                'value'                 => 'option 3',
                'created_at'            => $currectDateTime,
                'updated_at'            => $currectDateTime,
            ], [
                'id'                    => 16,
                'customer_attribute_id' => 7, // Work Industry
                'value'                 => 'option 1',
                'created_at'            => $currectDateTime,
                'updated_at'            => $currectDateTime,
            ], [
                'id'                    => 17,
                'customer_attribute_id' => 7, // Work Industry
                'value'                 => 'option 2',
                'created_at'            => $currectDateTime,
                'updated_at'            => $currectDateTime,
            ], [
                'id'                    => 18,
                'customer_attribute_id' => 7, // Work Industry
                'value'                 => 'option 3',
                'created_at'            => $currectDateTime,
                'updated_at'            => $currectDateTime,
            ], [
                'id'                    => 19,
                'customer_attribute_id' => 8, // Employment Status
                'value'                 => 'option 1',
                'created_at'            => $currectDateTime,
                'updated_at'            => $currectDateTime,
            ], [
                'id'                    => 20,
                'customer_attribute_id' => 8, // Employment Status
                'value'                 => 'option 2',
                'created_at'            => $currectDateTime,
                'updated_at'            => $currectDateTime,
            ], [
                'id'                    => 21,
                'customer_attribute_id' => 8, // Employment Status
                'value'                 => 'option 3',
                'created_at'            => $currectDateTime,
                'updated_at'            => $currectDateTime,
            ], [
                'id'                    => 22,
                'customer_attribute_id' => 17, // Civil Status
                'value'                 => 'option 1',
                'created_at'            => $currectDateTime,
                'updated_at'            => $currectDateTime,
            ], [
                'id'                    => 23,
                'customer_attribute_id' => 17, // Civil Status
                'value'                 => 'option 2',
                'created_at'            => $currectDateTime,
                'updated_at'            => $currectDateTime,
            ], [
                'id'                    => 24,
                'customer_attribute_id' => 17, // Civil Status
                'value'                 => 'option 3',
                'created_at'            => $currectDateTime,
                'updated_at'            => $currectDateTime,
            ], [
                'id'                    => 25,
                'customer_attribute_id' => 19, // Date of Birth
                'value'                 => 'option 1',
                'created_at'            => $currectDateTime,
                'updated_at'            => $currectDateTime,
            ], [
                'id'                    => 26,
                'customer_attribute_id' => 19, // Date of Birth
                'value'                 => 'option 2',
                'created_at'            => $currectDateTime,
                'updated_at'            => $currectDateTime,
            ], [
                'id'                    => 27,
                'customer_attribute_id' => 19, // Date of Birth
                'value'                 => 'option 3',
                'created_at'            => $currectDateTime,
                'updated_at'            => $currectDateTime,
            ], [
                'id'                    => 28,
                'customer_attribute_id' => 22, // Work Industry
                'value'                 => 'option 1',
                'created_at'            => $currectDateTime,
                'updated_at'            => $currectDateTime,
            ], [
                'id'                    => 29,
                'customer_attribute_id' => 22, // Work Industry
                'value'                 => 'option 2',
                'created_at'            => $currectDateTime,
                'updated_at'            => $currectDateTime,
            ], [
                'id'                    => 30,
                'customer_attribute_id' => 22, // Work Industry
                'value'                 => 'option 3',
                'created_at'            => $currectDateTime,
                'updated_at'            => $currectDateTime,
            ], [
                'id'                    => 31,
                'customer_attribute_id' => 24, // Nationality
                'value'                 => 'option 1',
                'created_at'            => $currectDateTime,
                'updated_at'            => $currectDateTime,
            ], [
                'id'                    => 32,
                'customer_attribute_id' => 24, // Nationality
                'value'                 => 'option 2',
                'created_at'            => $currectDateTime,
                'updated_at'            => $currectDateTime,
            ], [
                'id'                    => 33,
                'customer_attribute_id' => 24, // Nationality
                'value'                 => 'option 3',
                'created_at'            => $currectDateTime,
                'updated_at'            => $currectDateTime,
            ], [
                'id'                    => 34,
                'customer_attribute_id' => 25, // Employment Type
                'value'                 => 'option 1',
                'created_at'            => $currectDateTime,
                'updated_at'            => $currectDateTime,
            ], [
                'id'                    => 35,
                'customer_attribute_id' => 25, // Employment Type
                'value'                 => 'option 2',
                'created_at'            => $currectDateTime,
                'updated_at'            => $currectDateTime,
            ], [
                'id'                    => 36,
                'customer_attribute_id' => 25, // Employment Type
                'value'                 => 'option 3',
                'created_at'            => $currectDateTime,
                'updated_at'            => $currectDateTime,
            ], [
                'id'                    => 37,
                'customer_attribute_id' => 26, // Employment Status
                'value'                 => 'option 1',
                'created_at'            => $currectDateTime,
                'updated_at'            => $currectDateTime,
            ], [
                'id'                    => 38,
                'customer_attribute_id' => 26, // Employment Status
                'value'                 => 'option 2',
                'created_at'            => $currectDateTime,
                'updated_at'            => $currectDateTime,
            ], [
                'id'                    => 39,
                'customer_attribute_id' => 26, // Employment Status
                'value'                 => 'option 3',
                'created_at'            => $currectDateTime,
                'updated_at'            => $currectDateTime,
            ], [
                'id'                    => 40,
                'customer_attribute_id' => 18, // Gender
                'value'                 => 'Male',
                'created_at'            => $currectDateTime,
                'updated_at'            => $currectDateTime,
            ], [
                'id'                    => 41,
                'customer_attribute_id' => 18, // Gender
                'value'                 => 'Female',
                'created_at'            => $currectDateTime,
                'updated_at'            => $currectDateTime,
            ], [
                'id'                    => 42,
                'customer_attribute_id' => 18, // Gender
                'value'                 => 'Other',
                'created_at'            => $currectDateTime,
                'updated_at'            => $currectDateTime,
            ],
        ]);
    }
}