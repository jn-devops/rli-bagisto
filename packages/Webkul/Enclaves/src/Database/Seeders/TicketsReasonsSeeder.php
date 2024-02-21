<?php

namespace Webkul\Enclaves\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketsReasonsSeeder extends Seeder
{
    public function run()
    {
        DB::table('ticket_reasons')->delete();

        DB::table('ticket_reasons')->insert([
            [
                'id'   => 1,
                'name' => 'Reservation Fee',
            ], [
                'id'   => 2,
                'name' => 'Reservation Fee 1',
            ], [
                'id'   => 3,
                'name' => 'Reservation Fee 2',
            ],
        ]);
    }
}