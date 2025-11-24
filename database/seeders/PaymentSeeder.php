<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Payment;

class PaymentSeeder extends Seeder
{
    public function run(): void
    {
        $order = Order::first();
        if (!$order) return;

        Payment::create([
            'order_id'=>$order->id,
            'method'=>'cash',
            'amount'=>$order->total,
            'status'=>'pending'
        ]);
    }
}
