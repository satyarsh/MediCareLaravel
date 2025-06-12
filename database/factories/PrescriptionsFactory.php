<?php

namespace Database\Factories;

use App\Models\Patients;
use App\Models\Doctors;
use App\Models\Medications;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PrescriptionsFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $patient = Patients::inRandomOrder()->first();
        $doctor = Doctors::inRandomOrder()->first();
        $medication = Medications::inRandomOrder()->first();

        $dosages = ['10mg', '20mg', '100mg', '200mg', '500mg'];
        $quantityRanges = [10, 15, 20, 25, 30, 35, 40, 45, 50, 55, 60, 65, 70, 75, 80, 85, 90, 95, 100];

        return [
            'PatientID' => $patient->PatientID,
            'DoctorID' => $doctor->DoctorID,
            'MedicationID' => $medication->MedicationID,
            'PrescriptionDate' => fake()->date(),
            'Dosage' => fake()->randomElement($dosages),
            'QuantityPrescribed' => fake()->randomElement($quantityRanges),
            'RefillsAllowed' => fake()->numberBetween(0, 5),
            'RefillsRemaining' => fake()->numberBetween(0, 5),
        ];
    }
}
