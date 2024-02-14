<?php

namespace RLI\Attribute\Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

/*
* Note: this seeder should be run in the same script as AttributeGroupTableSeeder
*/
class AttributeTableSeeder extends Seeder
{
    public static int $processing_fee_id;
    public static int $location_id;
    public static int $floor_area_id;
    public static int $lot_area_id;
    public static int $finish_id;
    public static int $veranda_id;
    public static int $end_unit_id;

    public static int $ground_floor;
    public static int $bedrooms;
    public static int $t_and_b;
    public static int $carports;
    public static int $parking;
    public static int $inventory_sources;
    public static int $style;
    public static int $balcony;

    public static int $unit_type;

    public function run(): void
    {
        $now = Carbon::now();

        DB::table('attributes')->insert([
            'code'                => 'processing_fee',
            'admin_name'          => 'Processing Fee',
            'type'                => 'price',
            'validation'          => 'decimal',
            'position'            => NULL,
            'is_required'         => 1,
            'is_unique'           => 0,
            'value_per_locale'    => 0,
            'value_per_channel'   => 0,
            'default_value'       => NULL,
            'is_filterable'       => 1,
            'is_configurable'     => 0,
            'is_user_defined'     => 0,
            'is_visible_on_front' => 0,
            'created_at'          => $now,
            'updated_at'          => $now,
            'is_comparable'       => 1,
        ]);
        
        self::$processing_fee_id = DB::getPdo()->lastInsertId();

        DB::table('attributes')->insert([
            'code'                => 'location',
            'admin_name'          => 'Location',
            'type'                => 'select',
            'validation'          => NULL,
            'position'            => NULL,
            'is_required'         => 0,
            'is_unique'           => 0,
            'value_per_locale'    => 0,
            'value_per_channel'   => 0,
            'default_value'       => NULL,
            'is_filterable'       => 0,
            'is_configurable'     => 1,
            'is_user_defined'     => 1,
            'is_visible_on_front' => 1,
            'created_at'          => $now,
            'updated_at'          => $now,
            'is_comparable'       => 1,
        ]);
        self::$location_id = DB::getPdo()->lastInsertId();

        DB::table('attributes')->insert([
            'code'                => 'floor_area',
            'admin_name'          => 'Floor Area (sqm)',
            'type'                => 'text',
            'validation'          => NULL, // 'number',
            'regex'               => NULL, // '0',
            'position'            => NULL,
            'is_required'         => 0,
            'is_unique'           => 0,
            'value_per_locale'    => 0,
            'value_per_channel'   => 0,
            'default_value'       => NULL,
            'is_filterable'       => 0,
            'is_configurable'     => 0,
            'is_user_defined'     => 1,
            'is_visible_on_front' => 0,
            'created_at'          => $now,
            'updated_at'          => $now,
            'is_comparable'       => 1,
        ]);
        self::$floor_area_id = DB::getPdo()->lastInsertId();

        DB::table('attributes')->insert([
            'code'                => 'lot_area',
            'admin_name'          => 'Lot Area (sqm)',
            'type'                => 'text',
            'validation'          => NULL, // 'number',
            'regex'               => NULL, // '0',
            'position'            => NULL,
            'is_required'         => 0,
            'is_unique'           => 0,
            'value_per_locale'    => 0,
            'value_per_channel'   => 0,
            'default_value'       => NULL,
            'is_filterable'       => 0,
            'is_configurable'     => 0,
            'is_user_defined'     => 1,
            'is_visible_on_front' => 0,
            'created_at'          => $now,
            'updated_at'          => $now,
            'is_comparable'       => 1,
        ]);
        self::$lot_area_id = DB::getPdo()->lastInsertId();

        DB::table('attributes')->insert([
            'code'                => 'finished',
            'admin_name'          => 'Finish',
            'type'                => 'select',
            'validation'          => NULL,
            'position'            => NULL,
            'is_required'         => 0,
            'is_unique'           => 0,
            'value_per_locale'    => 0,
            'value_per_channel'   => 0,
            'default_value'       => NULL,
            'is_filterable'       => 0,
            'is_configurable'     => 1,
            'is_user_defined'     => 1,
            'is_visible_on_front' => 1,
            'created_at'          => $now,
            'updated_at'          => $now,
            'is_comparable'       => 1,
        ]);
        self::$finish_id = DB::getPdo()->lastInsertId();

        DB::table('attributes')->insert([
            'code'                => 'veranda',
            'admin_name'          => 'Veranda',
            'type'                => 'select',
            'validation'          => NULL,
            'position'            => NULL,
            'is_required'         => 0,
            'is_unique'           => 0,
            'value_per_locale'    => 0,
            'value_per_channel'   => 0,
            'default_value'       => NULL,
            'is_filterable'       => 0,
            'is_configurable'     => 1,
            'is_user_defined'     => 1,
            'is_visible_on_front' => 1,
            'created_at'          => $now,
            'updated_at'          => $now,
            'is_comparable'       => 1,
        ]);
        self::$veranda_id = DB::getPdo()->lastInsertId();

        DB::table('attributes')->insert([
            'code'                => 'end_unit',
            'admin_name'          => 'End Unit',
            'type'                => 'select',
            'validation'          => NULL,
            'position'            => NULL,
            'is_required'         => 0,
            'is_unique'           => 0,
            'value_per_locale'    => 0,
            'value_per_channel'   => 0,
            'default_value'       => NULL,
            'is_filterable'       => 0,
            'is_configurable'     => 1,
            'is_user_defined'     => 1,
            'is_visible_on_front' => 1,
            'created_at'          => $now,
            'updated_at'          => $now,
            'is_comparable'       => 1,
        ]);
        self::$end_unit_id = DB::getPdo()->lastInsertId();


        DB::table('attributes')->insert([
            'code'                => 'ground_floor',
            'admin_name'          => 'Ground Floor',
            'type'                => 'select',
            'validation'          => NULL,
            'position'            => NULL,
            'is_required'         => 0,
            'is_unique'           => 0,
            'value_per_locale'    => 0,
            'value_per_channel'   => 0,
            'default_value'       => NULL,
            'is_filterable'       => 0,
            'is_configurable'     => 1,
            'is_user_defined'     => 1,
            'is_visible_on_front' => 1,
            'created_at'          => $now,
            'updated_at'          => $now,
            'is_comparable'       => 1,
        ]);
        self::$ground_floor = DB::getPdo()->lastInsertId();


        DB::table('attributes')->insert([
            'code'                => 'bedrooms',
            'admin_name'          => 'Bedrooms',
            'type'                => 'text',
            'validation'          => NULL,
            'position'            => NULL,
            'is_required'         => 0,
            'is_unique'           => 0,
            'value_per_locale'    => 0,
            'value_per_channel'   => 0,
            'default_value'       => NULL,
            'is_filterable'       => 0,
            'is_configurable'     => 1,
            'is_user_defined'     => 1,
            'is_visible_on_front' => 1,
            'created_at'          => $now,
            'updated_at'          => $now,
            'is_comparable'       => 1,
        ]);
        self::$bedrooms = DB::getPdo()->lastInsertId();


        DB::table('attributes')->insert([
            'code'                => 't_and_b',
            'admin_name'          => 'T and B',
            'type'                => 'text',
            'validation'          => NULL,
            'position'            => NULL,
            'is_required'         => 0,
            'is_unique'           => 0,
            'value_per_locale'    => 0,
            'value_per_channel'   => 0,
            'default_value'       => NULL,
            'is_filterable'       => 0,
            'is_configurable'     => 1,
            'is_user_defined'     => 1,
            'is_visible_on_front' => 1,
            'created_at'          => $now,
            'updated_at'          => $now,
            'is_comparable'       => 1,
        ]);
        self::$t_and_b = DB::getPdo()->lastInsertId();


        DB::table('attributes')->insert([
            'code'                => 'carports',
            'admin_name'          => 'Carports',
            'type'                => 'text',
            'validation'          => NULL,
            'position'            => NULL,
            'is_required'         => 0,
            'is_unique'           => 0,
            'value_per_locale'    => 0,
            'value_per_channel'   => 0,
            'default_value'       => NULL,
            'is_filterable'       => 0,
            'is_configurable'     => 1,
            'is_user_defined'     => 1,
            'is_visible_on_front' => 1,
            'created_at'          => $now,
            'updated_at'          => $now,
            'is_comparable'       => 1,
        ]);
        self::$carports = DB::getPdo()->lastInsertId();


        DB::table('attributes')->insert([
            'code'                => 'parking',
            'admin_name'          => 'Parking',
            'type'                => 'text',
            'validation'          => NULL,
            'position'            => NULL,
            'is_required'         => 0,
            'is_unique'           => 0,
            'value_per_locale'    => 0,
            'value_per_channel'   => 0,
            'default_value'       => NULL,
            'is_filterable'       => 0,
            'is_configurable'     => 1,
            'is_user_defined'     => 1,
            'is_visible_on_front' => 1,
            'created_at'          => $now,
            'updated_at'          => $now,
            'is_comparable'       => 1,
        ]);
        self::$parking = DB::getPdo()->lastInsertId();


        DB::table('attributes')->insert([
            'code'                => 'inventory_sources',
            'admin_name'          => 'Inventory Sources',
            'type'                => 'text',
            'validation'          => NULL,
            'position'            => NULL,
            'is_required'         => 0,
            'is_unique'           => 0,
            'value_per_locale'    => 0,
            'value_per_channel'   => 0,
            'default_value'       => NULL,
            'is_filterable'       => 0,
            'is_configurable'     => 1,
            'is_user_defined'     => 1,
            'is_visible_on_front' => 1,
            'created_at'          => $now,
            'updated_at'          => $now,
            'is_comparable'       => 1,
        ]);
        self::$inventory_sources = DB::getPdo()->lastInsertId();

        DB::table('attributes')->insert([
            'code'                => 'style',
            'admin_name'          => 'Style',
            'type'                => 'select',
            'validation'          => NULL,
            'position'            => NULL,
            'is_required'         => 0,
            'is_unique'           => 0,
            'value_per_locale'    => 0,
            'value_per_channel'   => 0,
            'default_value'       => NULL,
            'is_filterable'       => 0,
            'is_configurable'     => 1,
            'is_user_defined'     => 1,
            'is_visible_on_front' => 1,
            'created_at'          => $now,
            'updated_at'          => $now,
            'is_comparable'       => 1,
        ]);
        self::$style = DB::getPdo()->lastInsertId();

        DB::table('attributes')->insert([
            'code'                => 'balcony',
            'admin_name'          => 'Balcony',
            'type'                => 'select',
            'validation'          => NULL,
            'position'            => NULL,
            'is_required'         => 0,
            'is_unique'           => 0,
            'value_per_locale'    => 0,
            'value_per_channel'   => 0,
            'default_value'       => NULL,
            'is_filterable'       => 0,
            'is_configurable'     => 1,
            'is_user_defined'     => 1,
            'is_visible_on_front' => 1,
            'created_at'          => $now,
            'updated_at'          => $now,
            'is_comparable'       => 1,
        ]);
        self::$balcony = DB::getPdo()->lastInsertId();

        DB::table('attributes')->insert([
            'code'                => 'unit_type',
            'admin_name'          => 'Unit Type',
            'type'                => 'select',
            'validation'          => NULL,
            'position'            => NULL,
            'is_required'         => 0,
            'is_unique'           => 0,
            'value_per_locale'    => 0,
            'value_per_channel'   => 0,
            'default_value'       => NULL,
            'is_filterable'       => 0,
            'is_configurable'     => 1,
            'is_user_defined'     => 1,
            'is_visible_on_front' => 1,
            'created_at'          => $now,
            'updated_at'          => $now,
            'is_comparable'       => 1,
        ]);
        self::$unit_type = DB::getPdo()->lastInsertId();


        DB::table('attribute_translations')->insert([
            [
                'id'           => self::$processing_fee_id,
                'locale'       => 'en',
                'name'         => 'Processing Fee',
                'attribute_id' => self::$processing_fee_id,
            ], [
                'id'           => self::$location_id,
                'locale'       => 'en',
                'name'         => 'Location',
                'attribute_id' => self::$location_id,
            ], [
                'id'           => self::$floor_area_id,
                'locale'       => 'en',
                'name'         => 'Floor Area (sqm)',
                'attribute_id' => self::$floor_area_id,
            ], [
                'id'           => self::$lot_area_id,
                'locale'       => 'en',
                'name'         => 'Lot Area (sqm)',
                'attribute_id' => self::$lot_area_id,
            ], [
                'id'           => self::$finish_id,
                'locale'       => 'en',
                'name'         => 'Finished',
                'attribute_id' => self::$finish_id,
            ], [
                'id'           => self::$veranda_id,
                'locale'       => 'en',
                'name'         => 'Veranda',
                'attribute_id' => self::$veranda_id,
            ], [
                'id'           => self::$end_unit_id,
                'locale'       => 'en',
                'name'         => 'End Unit',
                'attribute_id' => self::$end_unit_id,
            ], [
                'id'           => self::$ground_floor,
                'locale'       => 'en',
                'name'         => 'Ground Floor',
                'attribute_id' => self::$ground_floor,
            ], [
                'id'           => self::$bedrooms,
                'locale'       => 'en',
                'name'         => 'Bedrooms',
                'attribute_id' => self::$bedrooms,
            ], [
                'id'           => self::$t_and_b,
                'locale'       => 'en',
                'name'         => 'T and B',
                'attribute_id' => self::$t_and_b,
            ], [
                'id'           => self::$carports,
                'locale'       => 'en',
                'name'         => 'Carports',
                'attribute_id' => self::$carports,
            ], [
                'id'           => self::$parking,
                'locale'       => 'en',
                'name'         => 'Parking',
                'attribute_id' => self::$parking,
            ], [
                'id'           => self::$inventory_sources,
                'locale'       => 'en',
                'name'         => 'Inventory Sources',
                'attribute_id' => self::$inventory_sources,
            ],
            [
                'id'           => self::$balcony,
                'locale'       => 'en',
                'name'         => 'Balcony',
                'attribute_id' => self::$balcony,
            ],
            [
                'id'           => self::$style,
                'locale'       => 'en',
                'name'         => 'Style',
                'attribute_id' => self::$style,
            ],
            [
                'id'           => self::$unit_type,
                'locale'       => 'en',
                'name'         => 'Unit Type',
                'attribute_id' => self::$unit_type,
            ],
        ]);

        foreach (AttributeGroupTableSeeder::$attribute_family_groups as $attribute_family => $groups) {
            foreach ($groups as $group => $group_id) {
                switch ($group)  {
                    case AttributeGroupTableSeeder::GENERAL_GROUP:
                        DB::table('attribute_group_mappings')->insert([
                            [
                                'attribute_id'        => self::$location_id,
                                'attribute_group_id'  => $group_id,
                                'position'            => 100,
                            ], [
                                'attribute_id'        => self::$floor_area_id,
                                'attribute_group_id'  => $group_id,
                                'position'            => 101,
                            ], [
                                'attribute_id'        => self::$lot_area_id,
                                'attribute_group_id'  => $group_id,
                                'position'            => 102,
                            ], [
                                'attribute_id'        => self::$finish_id,
                                'attribute_group_id'  => $group_id,
                                'position'            => 103,
                            ], [
                                'attribute_id'        => self::$veranda_id,
                                'attribute_group_id'  => $group_id,
                                'position'            => 104,
                            ], [
                                'attribute_id'        => self::$end_unit_id,
                                'attribute_group_id'  => $group_id,
                                'position'            => 105,
                            ], [
                                'attribute_id'        => self::$ground_floor,
                                'attribute_group_id'  => $group_id,
                                'position'            => 106,
                            ], [
                                'attribute_id'        => self::$bedrooms,
                                'attribute_group_id'  => $group_id,
                                'position'            => 107,
                            ], [
                                'attribute_id'        => self::$t_and_b,
                                'attribute_group_id'  => $group_id,
                                'position'            => 108,
                            ], [
                                'attribute_id'        => self::$carports,
                                'attribute_group_id'  => $group_id,
                                'position'            => 109,
                            ], [
                                'attribute_id'        => self::$parking,
                                'attribute_group_id'  => $group_id,
                                'position'            => 110,
                            ], [
                                'attribute_id'        => self::$inventory_sources,
                                'attribute_group_id'  => $group_id,
                                'position'            => 111,
                            ], [
                                'attribute_id'        => self::$style,
                                'attribute_group_id'  => $group_id,
                                'position'            => 113,
                            ], [
                                'attribute_id'        => self::$balcony,
                                'attribute_group_id'  => $group_id,
                                'position'            => 114,
                            ], [
                                'attribute_id'        => self::$unit_type,
                                'attribute_group_id'  => $group_id,
                                'position'            => 115,
                            ]

                        ]);
                        break;
                    case AttributeGroupTableSeeder::PRICE_GROUP:
                        DB::table('attribute_group_mappings')->insert([
                            [
                                'attribute_id'        => self::$processing_fee_id,
                                'attribute_group_id'  => $group_id,
                                'position'            => 100,
                            ]
                        ]);
                        break;
                }
            }
        }
    }
}
