<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id('OrderID');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('OrderNumber')->unique();
            $table->decimal('TotalAmount', 10, 2);
            $table->enum('Status', ['pending', 'processing', 'shipped', 'completed', 'cancelled'])->default('pending');
            $table->text('ShippingAddress');
            $table->string('PaymentMethod')->nullable();
            $table->enum('PaymentStatus', ['paid', 'unpaid'])->default('unpaid');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
