<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('food_id');
            $table->integer('quantity')->default(0);
            $table->integer('threshold')->default(0);
            $table->timestamp('updated_at')->useCurrent();

            $table->foreign('food_id')
                ->references('id')->on('foods')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
