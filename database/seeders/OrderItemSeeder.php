<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OrderItem;

class OrderItemSeeder extends Seeder {
    public function run(): void {
        $items = [
            ['order_id' => 1, 'food_id' => 1, 'quantity' => 1, 'price' => 550.00, 'subtotal' => 550.00],
            ['order_id' => 1, 'food_id' => 2, 'quantity' => 1, 'price' => 250.00, 'subtotal' => 250.00],
            ['order_id' => 1, 'food_id' => 3, 'quantity' => 1, 'price' => 150.00, 'subtotal' => 150.00]
        ];

        foreach ($items as $item) {
            OrderItem::create($item);
        }
    }
}
