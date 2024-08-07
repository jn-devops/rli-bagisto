<?php

namespace RLI\Attribute\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/*
* Note: this seeder should be run in the same script as AttributeTableSeeder
*/
class AttributeOptionTableSeeder extends Seeder
{
    protected array $locations = ['Laguna', 'Cavite', 'Rizal', 'Bulacan'];

    protected array $finishes = ['Bare', 'Fitted', 'with ID'];

    protected array $brands = ['Agapeya Towns', 'Zaya', 'Pasinaya Homes Hilaga', 'Pagsibol Village Magalang Pampanga', 'Valenzia Enclave South', 'Valenzia Enclave North'];

    protected array $unit_types = ['House & Lot', 'Condominium'];

    protected array $property_types = ['Duplex', 'Single Attached'];

    protected array $end_unit_option = ['Yes', 'No'];

    protected array $veranda_option = ['Yes', 'No'];

    protected array $balcony_option = ['Yes', 'No'];

    protected array $eaves_option = ['Yes', 'No'];

    protected array $firewall_option = ['Yes', 'No'];

    protected array $colors = ['Red', 'Blue', 'Yellow'];

    protected array $styles = ['Slant', 'Flat'];
    protected array $lot_areas =
        ['30', '31', '32', '33', '34', '35', '36', '37', '38', '39', '40', '41', '42', '43', '44', '45', '46', '47', '48', '49', '50', '51', '52', '53', '54', '55', '56', '57', '58', '59', '60', '61', '62', '63', '64', '65', '66', '67', '68', '69', '70', '71', '72', '73', '74', '75', '76', '77', '78', '79', '80', '81', '82', '83', '84', '85', '86', '87', '88', '89', '90', '91', '92', '93', '94', '95', '96', '97', '98', '99', '100', '101', '102', '103', '104', '105', '106', '107', '108', '109', '110', '111', '112', '113', '114', '115', '116', '117', '118', '119', '120', '121', '122', '123', '124', '125', '126', '127', '128', '129', '130', '131', '132', '133', '134', '135', '136', '137', '138', '139', '140', '141', '142', '143', '144', '145', '146', '147', '148', '149', '150'];

    public function run(): void
    {
        $location_id = AttributeTableSeeder::$location_id;
        $sort_order = 1;
        foreach ($this->locations as $location) {
            DB::table('attribute_options')->insert([
                'admin_name'   => $location,
                'sort_order'   => $sort_order++,
                'attribute_id' => $location_id,
            ]);
            $attribute_option_id = DB::getPdo()->lastInsertId();
            DB::table('attribute_option_translations')->insert([
                'locale'              => 'en',
                'label'               => $location,
                'attribute_option_id' => $attribute_option_id,
            ]);
        }

        $finish_id = AttributeTableSeeder::$finish_id;
        $sort_order = 1;
        foreach ($this->finishes as $finish) {
            DB::table('attribute_options')->insert([
                'admin_name'   => $finish,
                'sort_order'   => $sort_order++,
                'attribute_id' => $finish_id,
            ]);
            $attribute_option_id = DB::getPdo()->lastInsertId();
            DB::table('attribute_option_translations')->insert([
                'locale'              => 'en',
                'label'               => $finish,
                'attribute_option_id' => $attribute_option_id,
            ]);
        }

        $veranda_id = AttributeTableSeeder::$veranda_id;
        $sort_order = 1;
        foreach ($this->veranda_option as $veranda) {
            DB::table('attribute_options')->insert([
                'admin_name'   => $veranda,
                'sort_order'   => $sort_order++,
                'attribute_id' => $veranda_id,
            ]);
            $attribute_option_id = DB::getPdo()->lastInsertId();
            DB::table('attribute_option_translations')->insert([
                'locale'              => 'en',
                'label'               => $veranda,
                'attribute_option_id' => $attribute_option_id,
            ]);
        }

        $end_unit_id = AttributeTableSeeder::$end_unit_id;
        $sort_order = 1;
        foreach ($this->end_unit_option as $end_unit) {
            DB::table('attribute_options')->insert([
                'admin_name'   => $end_unit,
                'sort_order'   => $sort_order++,
                'attribute_id' => $end_unit_id,
            ]);
            $attribute_option_id = DB::getPdo()->lastInsertId();
            DB::table('attribute_option_translations')->insert([
                'locale'              => 'en',
                'label'               => $end_unit,
                'attribute_option_id' => $attribute_option_id,
            ]);
        }

        $balcony_id = AttributeTableSeeder::$balcony_id;
        $sort_order = 1;
        foreach ($this->balcony_option as $balcony) {
            DB::table('attribute_options')->insert([
                'admin_name'   => $balcony,
                'sort_order'   => $sort_order++,
                'attribute_id' => $balcony_id,
            ]);
            $attribute_option_id = DB::getPdo()->lastInsertId();
            DB::table('attribute_option_translations')->insert([
                'locale'              => 'en',
                'label'               => $balcony,
                'attribute_option_id' => $attribute_option_id,
            ]);
        }

        $style_id = AttributeTableSeeder::$style_id;
        $sort_order = 1;
        foreach ($this->styles as $style) {
            DB::table('attribute_options')->insert([
                'admin_name'   => $style,
                'sort_order'   => $sort_order++,
                'attribute_id' => $style_id,
            ]);
            $attribute_option_id = DB::getPdo()->lastInsertId();
            DB::table('attribute_option_translations')->insert([
                'locale'              => 'en',
                'label'               => $style,
                'attribute_option_id' => $attribute_option_id,
            ]);
        }


        $property_type_id = AttributeTableSeeder::$property_type_id;
        $sort_order = 1;
        foreach ($this->property_types as $property_type) {
            DB::table('attribute_options')->insert([
                'admin_name'   => $property_type,
                'sort_order'   => $sort_order++,
                'attribute_id' => $property_type_id,
            ]);
            $attribute_option_id = DB::getPdo()->lastInsertId();
            DB::table('attribute_option_translations')->insert([
                'locale'              => 'en',
                'label'               => $property_type,
                'attribute_option_id' => $attribute_option_id,
            ]);
        }

        $firewall_id= AttributeTableSeeder::$firewall_id;
        $sort_order = 1;
        foreach ($this->firewall_option as $firewall) {
            DB::table('attribute_options')->insert([
                'admin_name'   => $firewall,
                'sort_order'   => $sort_order++,
                'attribute_id' => $firewall_id,
            ]);
            $attribute_option_id = DB::getPdo()->lastInsertId();
            DB::table('attribute_option_translations')->insert([
                'locale'              => 'en',
                'label'               => $firewall,
                'attribute_option_id' => $attribute_option_id,
            ]);
        }

        $eaves_id= AttributeTableSeeder::$eaves_id;
        $sort_order = 1;
        foreach ($this->eaves_option as $eaves) {
            DB::table('attribute_options')->insert([
                'admin_name'   => $eaves,
                'sort_order'   => $sort_order++,
                'attribute_id' => $eaves_id,
            ]);
            $attribute_option_id = DB::getPdo()->lastInsertId();
            DB::table('attribute_option_translations')->insert([
                'locale'              => 'en',
                'label'               => $eaves,
                'attribute_option_id' => $attribute_option_id,
            ]);
        }

        $brand_id= AttributeTableSeeder::$brand_id;
        $sort_order = 1;
        foreach ($this->brands as $brand) {
            DB::table('attribute_options')->insert([
                'admin_name'   => $brand,
                'sort_order'   => $sort_order++,
                'attribute_id' => $brand_id,
            ]);
            $attribute_option_id = DB::getPdo()->lastInsertId();
            DB::table('attribute_option_translations')->insert([
                'locale'              => 'en',
                'label'               => $brand,
                'attribute_option_id' => $attribute_option_id,
            ]);
        }

        $unit_type_id = AttributeTableSeeder::$unit_type_id;
        $sort_order = 1;
        foreach ($this->unit_types as $unit_type) {
            DB::table('attribute_options')->insert([
                'admin_name'   => $unit_type,
                'sort_order'   => $sort_order++,
                'attribute_id' => $unit_type_id,
            ]);
            $attribute_option_id = DB::getPdo()->lastInsertId();
            DB::table('attribute_option_translations')->insert([
                'locale'              => 'en',
                'label'               => $unit_type,
                'attribute_option_id' => $attribute_option_id,
            ]);
        }

        $color_id= AttributeTableSeeder::$color_id;
        $sort_order = 1;
        foreach ($this->colors as $color) {
            DB::table('attribute_options')->insert([
                'admin_name'   => $color,
                'sort_order'   => $sort_order++,
                'attribute_id' => $color_id,
            ]);
            $attribute_option_id = DB::getPdo()->lastInsertId();
            DB::table('attribute_option_translations')->insert([
                'locale'              => 'en',
                'label'               => $color,
                'attribute_option_id' => $attribute_option_id,
            ]);
        }

        $lot_area_id= AttributeTableSeeder::$lot_area_id;
        $sort_order = 1;
        foreach ($this->lot_areas as $lot_area) {
            DB::table('lot_area_options')->insert([
                'admin_name'   => $lot_area,
                'sort_order'   => $sort_order++,
                'attribute_id' => $lot_area_id,
            ]);
            $attribute_option_id = DB::getPdo()->lastInsertId();
            DB::table('attribute_option_translations')->insert([
                'locale'              => 'en',
                'label'               => $lot_area,
                'attribute_option_id' => $attribute_option_id,
            ]);
        }

    }
}
