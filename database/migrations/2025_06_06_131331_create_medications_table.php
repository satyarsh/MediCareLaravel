<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('medications', function (Blueprint $table) {
            $table->id('MedicationID');
            $table->string('Name', 100);
            $table->string('GenericName', 100)->nullable(); 
            $table->string('Strength', 50)->nullable(); //example "500mg"
            $table->string('Form', 50)->nullable(); //example "Tablet", "Capsule"
            $table->unsignedBigInteger('ManufacturerID');
            $table->boolean('RequiresPrescription')->default(true);
            $table->decimal('DefaultUnitPrice', 10, 2)->nullable();
            $table->unsignedInteger('Stock')->default(0);
            $table->foreign('ManufacturerID')->references('ManufacturerID')->on('manufacturers');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('medications');
    }
};
