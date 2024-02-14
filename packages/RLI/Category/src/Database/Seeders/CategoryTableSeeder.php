<?php

namespace RLI\Category\Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

/*
 * Category table seeder for RLI.
 *
 * seed
 *  2. House & Lot (filterable price)
 *  3. Condominium (filterable price)
 * TODO: update the description of lang of each non-English translation
 *
 * Command: php artisan db:seed --class=RLI\\Category\\Database\\Seeders\\CategoryTableSeeder
 */
class CategoryTableSeeder extends Seeder
{
    const ROOT_CATEGORY_ID = '1';
    const ELANVITAL_CATEGORY_ID = '2';
    const EVERYHOME_CATEGORY_ID = '3';
    const EXTRAORDINARY_CATEGORY_ID = '4';
    const EVERGLOW_CATEGORY_ID = '5';
    const PRICE_ATTRIBUTE_ID = '11';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $now = Carbon::now();

        // add House & Lot and Condominium categories
        DB::table('categories')->insert([
            [
                'id'          => self::ELANVITAL_CATEGORY_ID,
                'position'    => '1',
                'logo_path'   => NULL,
                'status'      => '1',
                '_lft'        => '14',
                '_rgt'        => '15',
                'parent_id'   => self::ROOT_CATEGORY_ID,
                'banner_path' => NULL,
                'created_at'  => $now,
                'updated_at'  => $now,
            ], [
                'id'          => self::EVERYHOME_CATEGORY_ID,
                'position'    => '3',
                'logo_path'   => NULL,
                'status'      => '1',
                '_lft'        => '16',
                '_rgt'        => '17',
                'parent_id'   => self::ROOT_CATEGORY_ID,
                'banner_path' => NULL,
                'created_at'  => $now,
                'updated_at'  => $now,
            ], [
                'id'          => self::EXTRAORDINARY_CATEGORY_ID,
                'position'    => '4',
                'logo_path'   => NULL,
                'status'      => '1',
                '_lft'        => '18',
                '_rgt'        => '19',
                'parent_id'   => self::ROOT_CATEGORY_ID,
                'banner_path' => NULL,
                'created_at'  => $now,
                'updated_at'  => $now,
            ], [
                'id'          => self::EVERGLOW_CATEGORY_ID,
                'position'    => '5',
                'logo_path'   => NULL,
                'status'      => '1',
                '_lft'        => '20',
                '_rgt'        => '21',
                'parent_id'   => self::ROOT_CATEGORY_ID,
                'banner_path' => NULL,
                'created_at'  => $now,
                'updated_at'  => $now,
            ]
        ]);

        // update Root category, change _rgt from 14 to 18, not sure why :-)
        DB::table('categories')->where('id','=', '1')->update(
            [
                '_rgt'        => '18',
                'created_at'  => $now,
                'updated_at'  => $now,
            ]
        );

        // add House & Lot translation
        DB::table('category_translations')->insert([
            [
                'name'             => 'Elanvital',
                'slug'             => 'elanvital',
                'description'      => '<p><span lang="en-US">Elanvital</span></p>',
                'url_path'         => 'elanvital',
                'meta_title'       => '',
                'meta_description' => '',
                'meta_keywords'    => '',
                'category_id'      => self::ELANVITAL_CATEGORY_ID,
                'locale_id'        => '1',
                'locale'           => 'en',
            ]
        ]);

        // add Condominium translation
        DB::table('category_translations')->insert([
            [
                'name'             => 'Everyhome',
                'slug'             => 'everyhome',
                'description'      => '<p><span lang="en-US">Everyhome</span></p>',
                'url_path'         => 'everyhome',
                'meta_title'       => '',
                'meta_description' => '',
                'meta_keywords'    => '',
                'category_id'      => self::EVERYHOME_CATEGORY_ID,
                'locale_id'        => '1',
                'locale'           => 'en',
            ],
        ]);

        DB::table('category_translations')->insert([
            [
                'name'             => 'Extraordinary',
                'slug'             => 'extraordinary',
                'description'      => '<p><span lang="en-US">Extraordinary</span></p>',
                'url_path'         => 'extraordinary',
                'meta_title'       => '',
                'meta_description' => '',
                'meta_keywords'    => '',
                'category_id'      => self::EXTRAORDINARY_CATEGORY_ID,
                'locale_id'        => '1',
                'locale'           => 'en',
            ]
        ]);

        DB::table('category_translations')->insert([
            [
                'name'             => 'Everglow',
                'slug'             => 'everglow',
                'description'      => '<p><span lang="en-US">Everglow</span></p>',
                'url_path'         => 'everglow',
                'meta_title'       => '',
                'meta_description' => '',
                'meta_keywords'    => '',
                'category_id'      => self::EVERGLOW_CATEGORY_ID,
                'locale_id'        => '1',
                'locale'           => 'en',
            ]
        ]);

        // add price attribute to filterable attributes of House & Lot and Condominium
        DB::table('category_filterable_attributes')->insert([
            [
                'category_id'  => self::ELANVITAL_CATEGORY_ID,
                'attribute_id' => self::PRICE_ATTRIBUTE_ID,
            ], [
                'category_id'  => self::EVERYHOME_CATEGORY_ID,
                'attribute_id' => self::PRICE_ATTRIBUTE_ID,
            ], [
                'category_id'  => self::EXTRAORDINARY_CATEGORY_ID,
                'attribute_id' => self::PRICE_ATTRIBUTE_ID,
            ], [
                'category_id'  => self::EVERGLOW_CATEGORY_ID,
                'attribute_id' => self::PRICE_ATTRIBUTE_ID,
            ]
        ]);
    }
}




