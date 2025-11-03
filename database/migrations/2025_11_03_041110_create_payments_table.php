<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->cascadeOnDelete();
            $table->enum('payment_method', ['cash', 'mpesa', 'card']);
            $table->decimal('amount', 10, 2);
            $table->string('transaction_code', 100)->nullable();
            $table->enum('status', ['pending', 'completed', 'failed'])->default('completed');
            $table->timestamp('paid_at')->useCurrent();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('payments');
    }
};
