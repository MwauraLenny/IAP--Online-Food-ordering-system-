<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Food;

class OrderItemSeeder extends Seeder
{
    public function run(): void
    {
        $order = Order::first();
        $pizza = Food::where('name', 'Margherita Pizza')->first();
        $burger = Food::where('name', 'Cheeseburger')->first();

        OrderItem::create([
            'order_id' => $order->id,
            'food_id' => $pizza->id,
            'quantity' => 1,
            'price' => $pizza->price
        ]);

        OrderItem::create([
            'order_id' => $order->id,
            'food_id' => $burger->id,
            'quantity' => 1,
            'price' => $burger->price
        ]);
    }
}
