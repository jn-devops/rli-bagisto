<?php

namespace Webkul\Enclaves\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketsStatusSeeder extends Seeder
{
    public function run()
    {
        DB::table('ticket_status')->delete();

        DB::table('ticket_status')->insert([
            [
                'id'   => 1,
                'name' => 'Resolved',
            ], [
                'id'   => 2,
                'name' => 'Pending',
            ], [
                'id'   => 3,
                'name' => 'Canceled',
            ],
        ]);
    }
}