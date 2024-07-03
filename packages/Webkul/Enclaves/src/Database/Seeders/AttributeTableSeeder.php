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

        DB::table('attributes')->insert([
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
        ]);

        $locales = $parameters['allowed_locales'] ?? [$defaultLocale];

        foreach ($locales as $locale) {
            DB::table('attribute_translations')->insert([
                [
                    'locale'       => $locale,
                    'name'         => trans('enclaves::app.admin.seeders.attribute.redirect_uri', [], $locale),
                    'attribute_id' => DB::table('attributes')->where('code' , 'ekyc_redirect_uri')->first()->id,
                ],
            ]);
        }

        $attributeGroupId = DB::table('attribute_groups')->where('code', 'general')->first()->id;

        DB::table('attribute_group_mappings')->insert([
            [
                'attribute_id'        => DB::table('attributes')->where('code' , 'ekyc_redirect_uri')->first()->id,
                'attribute_group_id'  => $attributeGroupId,
                'position'            => 3,
            ],
        ]);
    }
}
