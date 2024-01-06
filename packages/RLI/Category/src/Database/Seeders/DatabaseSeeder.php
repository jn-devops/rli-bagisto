<?php

namespace RLI\Category\Database\Seeders;

use Illuminate\Database\Seeder;

/*
* Category seeders for RLI.
*
*
* Command: php artisan db:seed --class=RLI\\Category\\Database\\Seeders\\DatabaseSeeder
*/
class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(CategoryTableSeeder::class);
    }
}
