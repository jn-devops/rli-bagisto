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
    const HOUSE_LOT_CATEGORY_ID = '2';
    const CONDOMINIUM_CATEGORY_ID = '3';
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
                'id'          => self::HOUSE_LOT_CATEGORY_ID,
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
                'id'          => self::CONDOMINIUM_CATEGORY_ID,
                'position'    => '1',
                'logo_path'   => NULL,
                'status'      => '1',
                '_lft'        => '16',
                '_rgt'        => '17',
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
                'name'             => 'House & Lot',
                'slug'             => 'house-lot',
                'description'      => '<p><span lang="en-US">House &amp; Lot</span></p>',
                'url_path'         => 'house-lot',
                'meta_title'       => '',
                'meta_description' => '',
                'meta_keywords'    => '',
                'category_id'      => self::HOUSE_LOT_CATEGORY_ID,
                'locale_id'        => '1',
                'locale'           => 'en',
            ], [
                'name'             => 'Casa y Lote',
                'slug'             => 'house-lot',
                'description'      => '<p><span lang="en-US">Casa y Lote</span></p>',
                'url_path'         => 'house-lot',
                'meta_title'       => '',
                'meta_description' => '',
                'meta_keywords'    => '',
                'category_id'      => self::HOUSE_LOT_CATEGORY_ID,
                'locale_id'        => '5',
                'locale'           => 'es',
            ], [
                'name'             => 'Maison et Terrain',
                'slug'             => 'house-lot',
                'description'      => '<p><span lang="en-US">Maison et Terrain</span></p>',
                'url_path'         => 'house-lot',
                'meta_title'       => '',
                'meta_description' => '',
                'meta_keywords'    => '',
                'category_id'      => self::HOUSE_LOT_CATEGORY_ID,
                'locale_id'        => '2',
                'locale'           => 'fr',
            ], [
                'name'             => 'Huis en Perceel',
                'slug'             => 'house-lot',
                'description'      => '<p><span lang="en-US">Huis en Perceel</span></p>',
                'url_path'         => 'house-lot',
                'meta_title'       => '',
                'meta_description' => '',
                'meta_keywords'    => '',
                'category_id'      => self::HOUSE_LOT_CATEGORY_ID,
                'locale_id'        => '3',
                'locale'           => 'nl',
            ], [
                'name'             => 'Ev ve Arsa',
                'slug'             => 'house-lot',
                'description'      => '<p><span lang="en-US">Ev ve Arsa</span></p>',
                'url_path'         => 'house-lot',
                'meta_title'       => '',
                'meta_description' => '',
                'meta_keywords'    => '',
                'category_id'      => self::HOUSE_LOT_CATEGORY_ID,
                'locale_id'        => '4',
                'locale'           => 'tr',
            ],
        ]);

        // add Condominium translation
        DB::table('category_translations')->insert([
            [
                'name'             => 'Condominium',
                'slug'             => 'condominium',
                'description'      => '<p><span lang="en-US">Condominium</span></p>',
                'url_path'         => 'condominium',
                'meta_title'       => '',
                'meta_description' => '',
                'meta_keywords'    => '',
                'category_id'      => self::CONDOMINIUM_CATEGORY_ID,
                'locale_id'        => '1',
                'locale'           => 'en',
            ], [
                'name'             => 'Condominio',
                'slug'             => 'condominium',
                'description'      => '<p><span lang="en-US">Condominio</span></p>',
                'url_path'         => 'condominium',
                'meta_title'       => '',
                'meta_description' => '',
                'meta_keywords'    => '',
                'category_id'      => self::CONDOMINIUM_CATEGORY_ID,
                'locale_id'        => '5',
                'locale'           => 'es',
            ], [
                'name'             => 'Condominium',
                'slug'             => 'condominium',
                'description'      => '<p><span lang="en-US">Condominium</span></p>',
                'url_path'         => 'condominium',
                'meta_title'       => '',
                'meta_description' => '',
                'meta_keywords'    => '',
                'category_id'      => self::CONDOMINIUM_CATEGORY_ID,
                'locale_id'        => '2',
                'locale'           => 'fr',
            ], [
                'name'             => 'Condominium',
                'slug'             => 'condominium',
                'description'      => '<p><span lang="en-US">Condominium</span></p>',
                'url_path'         => 'condominium',
                'meta_title'       => '',
                'meta_description' => '',
                'meta_keywords'    => '',
                'category_id'      => self::CONDOMINIUM_CATEGORY_ID,
                'locale_id'        => '3',
                'locale'           => 'nl',
            ], [
                'name'             => 'Kat Mülkiyeti',
                'slug'             => 'condominium',
                'description'      => '<p><span lang="en-US">Kat Mülkiyeti</span></p>',
                'url_path'         => 'condominium',
                'meta_title'       => '',
                'meta_description' => '',
                'meta_keywords'    => '',
                'category_id'      => self::CONDOMINIUM_CATEGORY_ID,
                'locale_id'        => '4',
                'locale'           => 'tr',
            ],
        ]);

        // add price attribute to filterable attributes of House & Lot and Condominium
        DB::table('category_filterable_attributes')->insert([
            [
                'category_id'  => self::HOUSE_LOT_CATEGORY_ID,
                'attribute_id' => self::PRICE_ATTRIBUTE_ID,
            ], [
                'category_id'  => self::CONDOMINIUM_CATEGORY_ID,
                'attribute_id' => self::PRICE_ATTRIBUTE_ID,
            ]
        ]);
    }
}
