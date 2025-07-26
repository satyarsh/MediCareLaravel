<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id('PatientID');
            $table->string('FirstName', 100);
            $table->string('LastName', 100);
            $table->date('DateOfBirth');
            $table->string('PhoneNumber', 20)->nullable();
            $table->string('HomeAddress', 255)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
