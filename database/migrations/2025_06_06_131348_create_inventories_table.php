<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->id('InventoryID');
            $table->unsignedBigInteger('MedicationID');
            $table->string('BatchNumber', 50);
            $table->date('ExpiryDate');
            $table->integer('QuantityOnHand')->default(0);
            $table->decimal('PurchasePrice', 10, 2)->nullable();
            $table->foreign('MedicationID')->references('MedicationID')->on('medications');
            $table->unique(['MedicationID', 'BatchNumber']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};
