<?php

namespace RLI\Attribute\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttributeFamilyTableSeeder extends Seeder
{
    const ELANVITAL_HOUSE_AND_LOT_ATTRIBUTE_FAMILY_ID = 2;

    const ELANVITAL_CONDOMINIUM_ATTRIBUTE_FAMILY_ID = 3;

    const EXTRAORDINARY_HOUSE_AND_LOT_ATTRIBUTE_FAMILY_ID = 4;

    const EVERYHOME_HOUSE_AND_LOT_ATTRIBUTE_FAMILY_ID = 5;

    public function run(): void
    {
        DB::table('attribute_families')->insert([
            [
                'id'              => self::ELANVITAL_HOUSE_AND_LOT_ATTRIBUTE_FAMILY_ID,
                'code'            => 'elanvital_house_and_lot',
                'name'            => 'Elanvital House & Lot',
                'status'          => 0,
                'is_user_defined' => 1,
            ], [
                'id'              => self::ELANVITAL_CONDOMINIUM_ATTRIBUTE_FAMILY_ID,
                'code'            => 'elanvital_condominium',
                'name'            => 'Elanvital Condominium',
                'status'          => 0,
                'is_user_defined' => 1,
            ], [
                'id'              => self::EXTRAORDINARY_HOUSE_AND_LOT_ATTRIBUTE_FAMILY_ID,
                'code'            => 'extraordinary_house_and_lot',
                'name'            => 'Extraordinary House & Lot',
                'status'          => 0,
                'is_user_defined' => 1,
            ], [
                'id'              => self::EVERYHOME_HOUSE_AND_LOT_ATTRIBUTE_FAMILY_ID,
                'code'            => 'everyhome_house_and_lot',
                'name'            => 'Everyhome House & Lot',
                'status'          => 0,
                'is_user_defined' => 1,
            ],
        ]);

    }
}
