<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id('OrderItemID');
            $table->unsignedBigInteger('OrderID');
            $table->unsignedBigInteger('MedicationID');
            $table->integer('Quantity');
            $table->decimal('Price', 8, 2);
            $table->timestamps();
            $table->foreign('OrderID')->references('OrderID')->on('orders');
            $table->foreign('MedicationID')->references('MedicationID')->on('medications');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
