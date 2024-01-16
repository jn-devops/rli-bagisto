<?php

namespace RLI\Attribute\Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class AttributeFamilyTableSeeder extends Seeder
{
    const HOUSE_LOT_ATTRIBUTE_FAMILY_ID = 2;
    const CONDOMINIUM_ATTRIBUTE_FAMILY_ID = 3;

    public function run(): void
    {
        DB::table('attribute_families')->insert([
            [
                'id'              => self::HOUSE_LOT_ATTRIBUTE_FAMILY_ID,
                'code'            => 'house_and_lot',
                'name'            => 'House & Lot',
                'status'          => 0,
                'is_user_defined' => 1,
            ], [
                'id'              => self::CONDOMINIUM_ATTRIBUTE_FAMILY_ID,
                'code'            => 'condominium',
                'name'            => 'Condominium',
                'status'          => 0,
                'is_user_defined' => 1,
            ]
        ]);


    }
}
