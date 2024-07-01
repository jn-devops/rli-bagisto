<?php

namespace Webkul\GoogleShoppingFeed\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Webkul\Attribute\Repositories\AttributeRepository;

class AttributeTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $attribute = app(AttributeRepository::class)->findOneByField('code', 'gtin');

        if ($attribute) {
            return;
        }

        $now = Carbon::now();

        app(AttributeRepository::class)->create([
            'code'                => 'gtin',
            'admin_name'          => 'GTIN',
            'type'                => 'text',
            'validation'          => NULL,
            'position'            => '28',
            'is_required'         => '0',
            'is_unique'           => '1',
            'value_per_locale'    => '0',
            'value_per_channel'   => '0',
            'is_filterable'       => '0',
            'is_configurable'     => '0',
            'is_user_defined'     => '1',
            'is_visible_on_front' => '1',
            'created_at'          => $now,
            'updated_at'          => $now,
            'is_comparable'       => '0',
        ]);

        app(AttributeRepository::class)->create([
            'code'                => 'mpn',
            'admin_name'          => 'MPN',
            'type'                => 'text',
            'validation'          => NULL,
            'position'            => '29',
            'is_required'         => '0',
            'is_unique'           => '0',
            'value_per_locale'    => '0',
            'value_per_channel'   => '0',
            'is_filterable'       => '0',
            'is_configurable'     => '0',
            'is_user_defined'     => '1',
            'is_visible_on_front' => '1',
            'created_at'          => $now,
            'updated_at'          => $now,
            'is_comparable'       => '0',
        ]);

        app(AttributeRepository::class)->create([
            'code'                => 'age_group',
            'admin_name'          => 'Age Group',
            'type'                => 'select',
            'validation'          => NULL,
            'position'            => '30',
            'is_required'         => '0',
            'is_unique'           => '0',
            'value_per_locale'    => '0',
            'value_per_channel'   => '0',
            'is_filterable'       => '0',
            'is_configurable'     => '1',
            'is_user_defined'     => '1',
            'is_visible_on_front' => '0',
            'created_at'          => $now,
            'updated_at'          => $now,
            'is_comparable'       => '0',
        ]);

        app(AttributeRepository::class)->create([
            'code'                => 'available_for',
            'admin_name'          => 'Product available for',
            'type'                => 'select',
            'validation'          => NULL,
            'position'            => '31',
            'is_required'         => '0',
            'is_unique'           => '0',
            'value_per_locale'    => '0',
            'value_per_channel'   => '0',
            'is_filterable'       => '0',
            'is_configurable'     => '1',
            'is_user_defined'     => '1',
            'is_visible_on_front' => '0',
            'created_at'          => $now,
            'updated_at'          => $now,
            'is_comparable'       => '0',
        ]);

        app(AttributeRepository::class)->create([
            'code'                => 'condition',
            'admin_name'          => 'Product Condition',
            'type'                => 'select',
            'validation'          => NULL,
            'position'            => '32',
            'is_required'         => '0',
            'is_unique'           => '0',
            'value_per_locale'    => '0',
            'value_per_channel'   => '0',
            'is_filterable'       => '0',
            'is_configurable'     => '1',
            'is_user_defined'     => '1',
            'is_visible_on_front' => '0',
            'created_at'          => $now,
            'updated_at'          => $now,
            'is_comparable'       => '0',
        ]);

        DB::table('attribute_translations')->insert([
            [
                'locale'       => 'en',
                'name'         => 'GTIN',
                'attribute_id' => app(AttributeRepository::class)->findOneByField('code', 'gtin')->id,
            ], [
                'locale'       => 'en',
                'name'         => 'MPN',
                'attribute_id' => app(AttributeRepository::class)->findOneByField('code', 'mpn')->id,
            ], [
                'locale'       => 'en',
                'name'         => 'Age Group',
                'attribute_id' => app(AttributeRepository::class)->findOneByField('code', 'age_group')->id,
            ], [
                'locale'       => 'en',
                'name'         => 'Product Available For',
                'attribute_id' =>  app(AttributeRepository::class)->findOneByField('code', 'available_for')->id,
            ], [
                'locale'       => 'en',
                'name'         => 'Product Condition',
                'attribute_id' => app(AttributeRepository::class)->findOneByField('code', 'condition')->id,
            ],
        ]);
    }
}