<?php

namespace Webkul\GoogleShoppingFeed\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Webkul\Attribute\Repositories\AttributeRepository;
use Webkul\Attribute\Repositories\AttributeOptionRepository;

class AttributeOptionTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $ageGroupAttributeId = app(AttributeRepository::class)->findOneByField('code', 'age_group')->id;

        $availableForAttributeId = app(AttributeRepository::class)->findOneByField('code', 'available_for')->id;

        $conditionAttributeId = app(AttributeRepository::class)->findOneByField('code', 'condition')->id;

        DB::table('attribute_options')->insert([
            [
                'admin_name'   => 'Adult',
                'sort_order'   => '1',
                'attribute_id' => $ageGroupAttributeId,
            ], [
                'admin_name'   => 'Child',
                'sort_order'   => '2',
                'attribute_id' => $ageGroupAttributeId,
            ], [
                'admin_name'   => 'Male',
                'sort_order'   => '1',
                'attribute_id' => $availableForAttributeId,
            ], [
                'admin_name'   => 'Female',
                'sort_order'   => '2',
                'attribute_id' => $availableForAttributeId,
            ], [
                'admin_name'   => 'Kids',
                'sort_order'   => '3',
                'attribute_id' => $availableForAttributeId,
            ], [
                'admin_name'   => 'New',
                'sort_order'   => '1',
                'attribute_id' => $conditionAttributeId,
            ], [
                'admin_name'   => 'Old',
                'sort_order'   => '2',
                'attribute_id' => $conditionAttributeId,
            ],
        ]);

        DB::table('attribute_option_translations')->insert([
            [
                'locale'              => 'en',
                'label'               => 'Adult',
                'attribute_option_id' =>  app(AttributeOptionRepository::class)->findOneByField('admin_name', 'Adult')->id,
            ], [
                'locale'              => 'en',
                'label'               => 'Child',
                'attribute_option_id' =>  app(AttributeOptionRepository::class)->findOneByField('admin_name', 'Child')->id,
            ], [
                'locale'              => 'en',
                'label'               => 'Male',
                'attribute_option_id' => app(AttributeOptionRepository::class)->findOneByField('admin_name', 'Male')->id,
            ], [
                'locale'              => 'en',
                'label'               => 'Female',
                'attribute_option_id' => app(AttributeOptionRepository::class)->findOneByField('admin_name', 'Female')->id,
            ], [
                'locale'              => 'en',
                'label'               => 'Kids',
                'attribute_option_id' => app(AttributeOptionRepository::class)->findOneByField('admin_name', 'Kids')->id,
            ], [
                'locale'              => 'en',
                'label'               => 'New',
                'attribute_option_id' => app(AttributeOptionRepository::class)->findOneByField('admin_name', 'New')->id,
            ], [
                'locale'              => 'en',
                'label'               => 'Old',
                'attribute_option_id' => app(AttributeOptionRepository::class)->findOneByField('admin_name', 'Old')->id,
            ],
        ]);
    }
}