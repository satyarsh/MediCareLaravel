<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->id('PrescriptionID');
            $table->unsignedBigInteger('PatientID');
            $table->unsignedBigInteger('DoctorID');
            $table->unsignedBigInteger('MedicationID');
            $table->date('PrescriptionDate');
            $table->string('Dosage');
            $table->integer('QuantityPrescribed');
            $table->integer('RefillsAllowed')->default(0);
            $table->integer('RefillsRemaining')->default(0);
            $table->foreign('PatientID')->references('PatientID')->on('patients');
            $table->foreign('DoctorID')->references('DoctorID')->on('doctors');
            $table->foreign('MedicationID')->references('MedicationID')->on('medications');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prescriptions');
    }
};
