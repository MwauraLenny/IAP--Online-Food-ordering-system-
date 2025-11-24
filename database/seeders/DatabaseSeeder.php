<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            BranchSeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            FoodSeeder::class,
            OrderSeeder::class,
            PaymentSeeder::class,
        ]);
    }
}
