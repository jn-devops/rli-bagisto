<?php

namespace Webkul\Enclaves\Database\Seeders;

use Illuminate\Database\Seeder;

/*
 * Command: php artisan db:seed --class="Webkul\\Enclaves\\Database\\Seeders\\DatabaseSeeder"
 */
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
        $this->call(CustomerAttributeAndOptions::class);
    }
}