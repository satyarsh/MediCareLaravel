<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctors>
 */
class DoctorsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'FirstName' => fake()->firstName(),
            'LastName' => fake()->lastName(),
            'ClinicName' => fake()->company(),
            'PhoneNumber' => fake('fa_IR')->phoneNumber(),
        ];
    }
}
