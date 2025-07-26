<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('manufacturers', function (Blueprint $table) {
            $table->id('ManufacturerID'); // Auto-incrementing primary key
            $table->string('Name', 100);
            $table->string('ContactPhone', 15)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('manufacturers');
    }
};
