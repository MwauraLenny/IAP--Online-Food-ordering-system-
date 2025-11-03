<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Payment;

class PaymentSeeder extends Seeder {
    public function run(): void {
        Payment::create([
            'order_id' => 1,
            'payment_method' => 'mpesa',
            'amount' => 950.00,
            'transaction_code' => 'MP12345678',
            'status' => 'completed'
        ]);
    }
}
