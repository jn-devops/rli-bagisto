<?php

namespace Webkul\Enclaves\Database\Seeders;

use Illuminate\Database\Seeder;
use Webkul\Enclaves\Database\Seeders\TicketsReasonsSeeder;
use Webkul\Enclaves\Database\Seeders\TicketsStatusSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TicketsReasonsSeeder::class);
        $this->call(TicketsStatusSeeder::class);
    }
}
