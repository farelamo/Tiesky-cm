<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        return $this->call([
            UserSeeder::class,
            BrandSeeder::class,
            CategorySeeder::class,
            ClientSeeder::class,
            ProductSeeder::class,
        ]);
    }
}