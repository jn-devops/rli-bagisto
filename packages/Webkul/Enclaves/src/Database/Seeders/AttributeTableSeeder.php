<?php

namespace Webkul\Enclaves\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

// Path: php artisan db:seed --class="Webkul\\Enclaves\\Database\Seeders\\AttributeTableSeeder"

class AttributeTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @param  array  $parameters
     * @return void
     */
    public function run($parameters = [])
    {
        $now = Carbon::now();
        $defaultLocale = $parameters['default_locale'] ?? config('app.locale');

        $newAttributes = [
            [
                'code'                => 'ekyc_redirect_uri',
                'admin_name'          => trans('enclaves::app.admin.seeders.attribute.redirect_uri', [], $defaultLocale),
                'type'                => 'text',
                'validation'          => null,
                'position'            => 1,
                'is_required'         => 1,
                'is_unique'           => 1,
                'value_per_locale'    => 0,
                'value_per_channel'   => 0,
                'default_value'       => null,
                'is_filterable'       => 0,
                'is_configurable'     => 0,
                'is_user_defined'     => 0,
                'is_visible_on_front' => 0,
                'is_comparable'       => 0,
                'enable_wysiwyg'      => 0,
                'created_at'          => $now,
                'updated_at'          => $now,
            ],
            [
                'code'                => 'schedule_visit_redirect_url',
                'admin_name'          => trans('enclaves::app.admin.seeders.attribute.schedule_visit_redirect_url', [], $defaultLocale),
                'type'                => 'text',
                'validation'          => null,
                'position'            => 1,
                'is_required'         => 1,
                'is_unique'           => 1,
                'value_per_locale'    => 0,
                'value_per_channel'   => 0,
                'default_value'       => null,
                'is_filterable'       => 0,
                'is_configurable'     => 0,
                'is_user_defined'     => 0,
                'is_visible_on_front' => 0,
                'is_comparable'       => 0,
                'enable_wysiwyg'      => 0,
                'created_at'          => $now,
                'updated_at'          => $now,
            ],
            [
                'code'                => 'avail_now_redirect_url',
                'admin_name'          => trans('enclaves::app.admin.seeders.attribute.avail_now_redirect_url', [], $defaultLocale),
                'type'                => 'text',
                'validation'          => null,
                'position'            => 1,
                'is_required'         => 1,
                'is_unique'           => 1,
                'value_per_locale'    => 0,
                'value_per_channel'   => 0,
                'default_value'       => null,
                'is_filterable'       => 0,
                'is_configurable'     => 0,
                'is_user_defined'     => 0,
                'is_visible_on_front' => 0,
                'is_comparable'       => 0,
                'enable_wysiwyg'      => 0,
                'created_at'          => $now,
                'updated_at'          => $now,
            ],
            [
                'id'                  => 25,
                'code'                => 'monthly_amortization',
                'admin_name'          => trans('enclaves::app.admin.seeders.attribute.monthly_amortization', [], $defaultLocale),
                'type'                => 'select',
                'validation'          => null,
                'position'            => 28,
                'is_required'         => 0,
                'is_unique'           => 0,
                'value_per_locale'    => 0,
                'value_per_channel'   => 0,
                'default_value'       => null,
                'is_filterable'       => 1,
                'is_configurable'     => 1,
                'is_user_defined'     => 1,
                'is_visible_on_front' => 1,
                'is_comparable'       => 0,
                'enable_wysiwyg'      => 0,
                'created_at'          => $now,
                'updated_at'          => $now,
                'options'             => [
                    'option_1'  => 3450,
                    'option_2'  => 8270,
                    'option_3'  => 10400,
                    'option_4'  => 18800,
                    'option_5'  => 19900,
                    'option_6'  => 20950,
                    'option_7'  => 22350,
                    'option_8'  => 23900,
                    'option_9'  => 29350,
                    'option_10' => 40500,
                ],
            ],
            [
                'code'                => 'price_range',
                'admin_name'          => trans('enclaves::app.admin.seeders.attribute.price_range', [], $defaultLocale),
                'type'                => 'select',
                'validation'          => null,
                'position'            => 28,
                'is_required'         => 0,
                'is_unique'           => 0,
                'value_per_locale'    => 0,
                'value_per_channel'   => 0,
                'default_value'       => null,
                'is_filterable'       => 1,
                'is_configurable'     => 1,
                'is_user_defined'     => 1,
                'is_visible_on_front' => 1,
                'is_comparable'       => 0,
                'enable_wysiwyg'      => 0,
                'created_at'          => $now,
                'updated_at'          => $now,
                'options'             => [
                    'option_1'  => 750000,
                    'option_2'  => 1200000,
                    'option_3'  => 1500000,
                    'option_4'  => 2850000,
                    'option_5'  => 3420000,
                    'option_6'  => 5800000,
                    'option_7'  => 2700000,
                    'option_8'  => 3000000,
                    'option_9'  => 3200000,
                    'option_10' => 4200000,
                ],
            ],
        ];


        foreach ($newAttributes as $attr) {
            $isExits = DB::table('attributes')->where('code', $attr['code'])->first();

            if (!$isExits) {
                $insertedAttrId = DB::table('attributes')->insertGetId(
                    [
                        'code'                => $attr['code'],
                        'admin_name'          => $attr['admin_name'],
                        'type'                => $attr['type'],
                        'validation'          => $attr['validation'],
                        'position'            => $attr['position'],
                        'is_required'         => $attr['is_required'],
                        'is_unique'           => $attr['is_unique'],
                        'value_per_locale'    => $attr['value_per_locale'],
                        'value_per_channel'   => $attr['value_per_channel'],
                        'default_value'       => $attr['default_value'],
                        'is_filterable'       => $attr['is_filterable'],
                        'is_configurable'     => $attr['is_configurable'],
                        'is_user_defined'     => $attr['is_user_defined'],
                        'is_visible_on_front' => $attr['is_visible_on_front'],
                        'is_comparable'       => $attr['is_comparable'],
                        'enable_wysiwyg'      => $attr['enable_wysiwyg'],
                        'created_at'          => $now,
                        'updated_at'          => $now,
                    ],
                );

                $locales = $parameters['allowed_locales'] ?? [$defaultLocale];

                foreach ($locales as $locale) {
                    DB::table('attribute_translations')->insert([
                        [
                            'locale'       => $locale,
                            'name'         => trans('enclaves::app.admin.seeders.attribute.' . $attr['code'], [], $locale),
                            'attribute_id' => $insertedAttrId,
                        ],
                    ]);
                }

                $attributeGroupId = DB::table('attribute_groups')->where('code', 'general')->first()->id;

                DB::table('attribute_group_mappings')->insert([
                    [
                        'attribute_id'        => $insertedAttrId,
                        'attribute_group_id'  => $attributeGroupId,
                        'position'            => 3,
                    ],
                ]);

                if ($attr['type'] === 'select') {

                    $sort_order = 1;
                    foreach ($attr['options'] as $label => $option) {
                        $attribute_option_id =  DB::table('attribute_options')->insertGetId([
                            'admin_name'   => $option,
                            'sort_order'   => $sort_order++,
                            'attribute_id' => $insertedAttrId,
                        ]);

                        foreach ($locales as $locale) {
                            DB::table('attribute_option_translations')->insert([
                                'locale'              => $locale,
                                'label'               => trans('enclaves::app.admin.seeders.attribute.' . $attr['code'] . '_options.' . $label, [], $locale),
                                'attribute_option_id' => $attribute_option_id,
                            ]);
                        }
                    }
                }
            }
        }
    }
}
