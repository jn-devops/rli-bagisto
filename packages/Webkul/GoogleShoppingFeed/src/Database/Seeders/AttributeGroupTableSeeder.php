<?php

namespace Webkul\GoogleShoppingFeed\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Webkul\Attribute\Repositories\AttributeRepository;
use Webkul\Attribute\Repositories\AttributeGroupRepository;

class AttributeGroupTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        app(AttributeGroupRepository::class)->create([
            'name'                => 'Google Shopping',
            'position'            => '11',
            'is_user_defined'     => '0',
            'attribute_family_id' => '1'
        ]);

        $attributeGroup = app(AttributeGroupRepository::class)->findOneByField('name', 'Google Shopping');

        DB::table('attribute_group_mappings')->insert([
            [
                'attribute_id'        => app(AttributeRepository::class)->findOneByField('code', 'gtin')->id,
                'attribute_group_id'  => $attributeGroup->id,
                'position'            => app(AttributeRepository::class)->findOneByField('code', 'gtin')->id,
            ], [
                'attribute_id'        => app(AttributeRepository::class)->findOneByField('code', 'mpn')->id,
                'attribute_group_id'  => $attributeGroup->id,
                'position'            => app(AttributeRepository::class)->findOneByField('code', 'mpn')->id,
            ], [
                'attribute_id'        => app(AttributeRepository::class)->findOneByField('code', 'age_group')->id,
                'attribute_group_id'  => $attributeGroup->id,
                'position'            => app(AttributeRepository::class)->findOneByField('code', 'age_group')->id,
            ], [
                'attribute_id'        => app(AttributeRepository::class)->findOneByField('code', 'available_for')->id,
                'attribute_group_id'  => $attributeGroup->id,
                'position'            => app(AttributeRepository::class)->findOneByField('code', 'available_for')->id,
            ], [
                'attribute_id'        => app(AttributeRepository::class)->findOneByField('code', 'condition')->id,
                'attribute_group_id'  => $attributeGroup->id,
                'position'            => app(AttributeRepository::class)->findOneByField('code', 'condition')->id,
            ],
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
    }
}