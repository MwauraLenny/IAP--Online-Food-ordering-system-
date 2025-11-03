<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;

class OrderSeeder extends Seeder {
    public function run(): void {
        Order::create([
            'user_id' => 2, // Customer
            'total_amount' => 950.00,
            'status' => 'confirmed',
            'payment_status' => 'paid'
        ]);
    }
}
