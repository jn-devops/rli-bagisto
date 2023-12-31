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
                            ],
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
