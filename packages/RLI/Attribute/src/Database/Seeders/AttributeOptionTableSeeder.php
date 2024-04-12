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

    protected array $finishes = ['Bare', 'Fitted'];

    protected array $present_absent = ['Present', 'Absent'];

    protected array $yes_no = ['Yes', 'No'];

    protected array $style_option = ['Slant', 'Flat'];

    protected array $unit_type_option = ['House & Lot', 'Condominium'];

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
        foreach ($this->present_absent as $present_absent) {
            DB::table('attribute_options')->insert([
                'admin_name'   => $present_absent,
                'sort_order'   => $sort_order++,
                'attribute_id' => $veranda_id,
            ]);
            $attribute_option_id = DB::getPdo()->lastInsertId();
            DB::table('attribute_option_translations')->insert([
                'locale'              => 'en',
                'label'               => $present_absent,
                'attribute_option_id' => $attribute_option_id,
            ]);
        }

        $end_unit_id = AttributeTableSeeder::$end_unit_id;
        $sort_order = 1;
        foreach ($this->yes_no as $yes_no) {
            DB::table('attribute_options')->insert([
                'admin_name'   => $yes_no,
                'sort_order'   => $sort_order++,
                'attribute_id' => $end_unit_id,
            ]);
            $attribute_option_id = DB::getPdo()->lastInsertId();
            DB::table('attribute_option_translations')->insert([
                'locale'              => 'en',
                'label'               => $yes_no,
                'attribute_option_id' => $attribute_option_id,
            ]);
        }

        $balcony = AttributeTableSeeder::$balcony;
        $sort_order = 1;
        foreach ($this->yes_no as $yes_no) {
            DB::table('attribute_options')->insert([
                'admin_name'   => $yes_no,
                'sort_order'   => $sort_order++,
                'attribute_id' => $balcony,
            ]);
            $attribute_option_id = DB::getPdo()->lastInsertId();
            DB::table('attribute_option_translations')->insert([
                'locale'              => 'en',
                'label'               => $balcony,
                'attribute_option_id' => $attribute_option_id,
            ]);
        }

        $style = AttributeTableSeeder::$style;
        $sort_order = 1;
        foreach ($this->style_option as $style_option) {
            DB::table('attribute_options')->insert([
                'admin_name'   => $style_option,
                'sort_order'   => $sort_order++,
                'attribute_id' => $style,
            ]);
            $attribute_option_id = DB::getPdo()->lastInsertId();
            DB::table('attribute_option_translations')->insert([
                'locale'              => 'en',
                'label'               => $style,
                'attribute_option_id' => $attribute_option_id,
            ]);
        }

        $unit_type = AttributeTableSeeder::$unit_type;
        $sort_order = 1;
        foreach ($this->unit_type_option as $unit_type_opt) {
            DB::table('attribute_options')->insert([
                'admin_name'   => $unit_type_opt,
                'sort_order'   => $sort_order++,
                'attribute_id' => $style,
            ]);
            $attribute_option_id = DB::getPdo()->lastInsertId();
            DB::table('attribute_option_translations')->insert([
                'locale'              => 'en',
                'label'               => $style,
                'attribute_option_id' => $attribute_option_id,
            ]);
        }

    }
}
