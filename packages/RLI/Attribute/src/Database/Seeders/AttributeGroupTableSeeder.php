<?php

namespace RLI\Attribute\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttributeGroupTableSeeder extends Seeder
{
    const GENERAL_GROUP = 'General';

    const DESCRIPTION_GROUP = 'Description';

    const META_DESCRIPTION_GROUP = 'Meta Description';

    const PRICE_GROUP = 'Price';

    const SHIPPING_GROUP = 'Shipping';

    const SETTINGS_GROUP = 'Settings';

    const INVENTORIES_GROUP = 'Inventories';

    public static array $attribute_family_groups = [];
    //    public static int $general_group_id;
    //    public static int $description_group_id;
    //    public static int $meta_description_group_id;
    //    public static int $price_group_id;
    //    public static int $shipping_group_id;
    //    public static int $settings_group_id;
    //    public static int $inventories_group_id;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $attribute_family_ids = [
            AttributeFamilyTableSeeder::HOUSE_LOT_ATTRIBUTE_FAMILY_ID,
            AttributeFamilyTableSeeder::CONDOMINIUM_ATTRIBUTE_FAMILY_ID,
            AttributeFamilyTableSeeder::MARKET_SEGMENT_ATTRIBUTE_FAMILY_ID,
        ];

        foreach ($attribute_family_ids as $attribute_family_id) {
            DB::table('attribute_groups')->insert([
                'name'                => self::GENERAL_GROUP,
                'column'              => 1,
                'is_user_defined'     => 0,
                'position'            => 1,
                'attribute_family_id' => $attribute_family_id,
            ]);
            $general_group_id = self::$attribute_family_groups[$attribute_family_id][self::GENERAL_GROUP] = DB::getPdo()->lastInsertId();

            DB::table('attribute_group_mappings')->insert([
                /**
                 * General Group Attributes
                 */
                [
                    'attribute_id'        => 1,
                    'attribute_group_id'  => $general_group_id,
                    'position'            => 1,
                ], [
                    'attribute_id'        => 27,
                    'attribute_group_id'  => $general_group_id,
                    'position'            => 2,
                ], [
                    'attribute_id'        => 2,
                    'attribute_group_id'  => $general_group_id,
                    'position'            => 3,
                ], [
                    'attribute_id'        => 3,
                    'attribute_group_id'  => $general_group_id,
                    'position'            => 4,
                ], [
                    'attribute_id'        => 4,
                    'attribute_group_id'  => $general_group_id,
                    'position'            => 5,
                ],
                //                [
                //                    'attribute_id'        => 23,
                //                    'attribute_group_id'  => $general_group_id,
                //                    'position'            => 6,
                //                ],
                //                [
                //                    'attribute_id'        => 24,
                //                    'attribute_group_id'  => $general_group_id,
                //                    'position'            => 7,
                //                ],
                [
                    'attribute_id'        => 25,
                    'attribute_group_id'  => $general_group_id,
                    'position'            => 8,
                ],
            ]);

            DB::table('attribute_groups')->insert([
                'name'                => self::DESCRIPTION_GROUP,
                'column'              => 1,
                'is_user_defined'     => 0,
                'position'            => 2,
                'attribute_family_id' => $attribute_family_id,
            ]);

            $description_group_id = self::$attribute_family_groups[$attribute_family_id][self::DESCRIPTION_GROUP] = DB::getPdo()->lastInsertId();

            DB::table('attribute_group_mappings')->insert([
                /**
                 * Description Group Attributes
                 */
                [
                    'attribute_id'        => 9,
                    'attribute_group_id'  => $description_group_id,
                    'position'            => 1,
                ], [
                    'attribute_id'        => 10,
                    'attribute_group_id'  => $description_group_id,
                    'position'            => 2,
                ],
            ]);

            DB::table('attribute_groups')->insert([
                'name'                => self::META_DESCRIPTION_GROUP,
                'column'              => 1,
                'is_user_defined'     => 0,
                'position'            => 3,
                'attribute_family_id' => $attribute_family_id,
            ]);

            $meta_description_group_id = self::$attribute_family_groups[$attribute_family_id][self::META_DESCRIPTION_GROUP] = DB::getPdo()->lastInsertId();

            DB::table('attribute_group_mappings')->insert([
                /**
                 * Meta Description Group Attributes
                 */
                [
                    'attribute_id'        => 13,
                    'attribute_group_id'  => $meta_description_group_id,
                    'position'            => 3,
                ], [
                    'attribute_id'        => 14,
                    'attribute_group_id'  => $meta_description_group_id,
                    'position'            => 4,
                ], [
                    'attribute_id'        => 15,
                    'attribute_group_id'  => $meta_description_group_id,
                    'position'            => 5,
                ],
            ]);

            DB::table('attribute_groups')->insert([
                'name'                => self::PRICE_GROUP,
                'column'              => 2,
                'is_user_defined'     => 0,
                'position'            => 1,
                'attribute_family_id' => $attribute_family_id,
            ]);

            $price_group_id = self::$attribute_family_groups[$attribute_family_id][self::PRICE_GROUP] = DB::getPdo()->lastInsertId();

            DB::table('attribute_group_mappings')->insert([
                /**
                 * Price Group Attributes
                 */
                [
                    'attribute_id'        => 11,
                    'attribute_group_id'  => $price_group_id,
                    'position'            => 1,
                ],
                //                [
                //                    'attribute_id'        => 12,
                //                    'attribute_group_id'  => $price_group_id,
                //                    'position'            => 2,
                //                ],
                [
                    'attribute_id'        => 16,
                    'attribute_group_id'  => $price_group_id,
                    'position'            => 1,
                ], [
                    'attribute_id'        => 17,
                    'attribute_group_id'  => $price_group_id,
                    'position'            => 2,
                ], [
                    'attribute_id'        => 18,
                    'attribute_group_id'  => $price_group_id,
                    'position'            => 3,
                ],
            ]);

            DB::table('attribute_groups')->insert([
                'name'                => self::SHIPPING_GROUP,
                'column'              => 2,
                'is_user_defined'     => 0,
                'position'            => 2,
                'attribute_family_id' => $attribute_family_id,
            ]);

            $shipping_group_id = self::$attribute_family_groups[$attribute_family_id][self::SHIPPING_GROUP] = DB::getPdo()->lastInsertId();

            DB::table('attribute_group_mappings')->insert([
                /**
                 * Shipping Group Attributes
                 */
                //                [
                //                    'attribute_id'        => 19,
                //                    'attribute_group_id'  => $shipping_group_id,
                //                    'position'            => 1,
                //                ],
                //                [
                //                    'attribute_id'        => 20,
                //                    'attribute_group_id'  => $shipping_group_id,
                //                    'position'            => 2,
                //                ],
                //                [
                //                    'attribute_id'        => 21,
                //                    'attribute_group_id'  => $shipping_group_id,
                //                    'position'            => 3,
                //                ],
                [
                    'attribute_id'        => 22,
                    'attribute_group_id'  => $shipping_group_id,
                    'position'            => 4,
                ],
            ]);

            DB::table('attribute_groups')->insert([
                'name'                => self::SETTINGS_GROUP,
                'column'              => 2,
                'is_user_defined'     => 0,
                'position'            => 3,
                'attribute_family_id' => $attribute_family_id,
            ]);

            $settings_group_id = self::$attribute_family_groups[$attribute_family_id][self::SETTINGS_GROUP] = DB::getPdo()->lastInsertId();

            DB::table('attribute_group_mappings')->insert([
                /**
                 * Settings Group Attributes
                 */
                [
                    'attribute_id'        => 5,
                    'attribute_group_id'  => $settings_group_id,
                    'position'            => 1,
                ], [
                    'attribute_id'        => 6,
                    'attribute_group_id'  => $settings_group_id,
                    'position'            => 2,
                ], [
                    'attribute_id'        => 7,
                    'attribute_group_id'  => $settings_group_id,
                    'position'            => 3,
                ], [
                    'attribute_id'        => 8,
                    'attribute_group_id'  => $settings_group_id,
                    'position'            => 4,
                ], [
                    'attribute_id'        => 26,
                    'attribute_group_id'  => $settings_group_id,
                    'position'            => 5,
                ],
            ]);

            DB::table('attribute_groups')->insert([
                'name'                => self::INVENTORIES_GROUP,
                'column'              => 2,
                'is_user_defined'     => 0,
                'position'            => 4,
                'attribute_family_id' => $attribute_family_id,
            ]);

            $inventories_group_id = self::$attribute_family_groups[$attribute_family_id][self::INVENTORIES_GROUP] = DB::getPdo()->lastInsertId();

            DB::table('attribute_group_mappings')->insert([
                /**
                 * Inventories Group Attributes
                 */
                [
                    'attribute_id'        => 28,
                    'attribute_group_id'  => $inventories_group_id,
                    'position'            => 1,
                ],
            ]);
        }
    }
}
