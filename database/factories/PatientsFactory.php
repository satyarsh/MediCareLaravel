<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PatientsFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'FirstName' => fake()->firstName(),
            'LastName' => fake()->lastName(),
            'DateOfBirth' => fake()->date(),
            'PhoneNumber' => fake('fa_IR')->unique()->phoneNumber(),
            'HomeAddress' => substr(fake()->address(), 0, 20),
        ];
    }
}
