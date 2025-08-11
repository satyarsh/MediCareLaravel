<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id('CartItemID');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('MedicationID');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('MedicationID')->references('MedicationID')->on('medications');
            $table->unsignedInteger('Quantity');
            $table->decimal('Price', 8, 2); // Price at the time of adding to cart
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
