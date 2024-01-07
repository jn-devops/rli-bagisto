<?php

namespace RLI\Attribute\Database\Seeders;

use Illuminate\Database\Seeder;

/*
* Attribute seeders for RLI.
*
*
* Command: php artisan db:seed --class=RLI\\Attribute\\Database\\Seeders\\DatabaseSeeder
*/
class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(AttributeFamilyTableSeeder::class);
        $this->call(AttributeGroupTableSeeder::class);
        $this->call(AttributeTableSeeder::class);
        $this->call(AttributeOptionTableSeeder::class);
    }
}
