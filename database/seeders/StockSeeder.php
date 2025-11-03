<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Stock;

class StockSeeder extends Seeder {
    public function run(): void {
        $stocks = [
            ['food_id' => 1, 'quantity' => 50, 'threshold' => 10],
            ['food_id' => 2, 'quantity' => 100, 'threshold' => 15],
            ['food_id' => 3, 'quantity' => 80, 'threshold' => 10]
        ];

        foreach ($stocks as $stock) {
            Stock::create($stock);
        }
    }
}
