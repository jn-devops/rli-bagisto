<?php

namespace RLI\Attribute\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttributeFamilyTableSeeder extends Seeder
{
    const HOUSE_LOT_ATTRIBUTE_FAMILY_ID = 2;

    const CONDOMINIUM_ATTRIBUTE_FAMILY_ID = 3;

    const MARKET_SEGMENT_ATTRIBUTE_FAMILY_ID = 4;

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
            ], [
                'id'              => self::MARKET_SEGMENT_ATTRIBUTE_FAMILY_ID,
                'code'            => 'market_segment',
                'name'            => 'Market Segment',
                'status'          => 0,
                'is_user_defined' => 1,
            ],
        ]);

    }
}
