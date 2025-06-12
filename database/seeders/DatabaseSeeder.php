<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Patients;
use App\Models\Prescriptions;
use App\Models\Doctors;
use App\Models\Medications;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Using factories/UserFactory for this
        User::factory(20)->create();

        //Calling AdminUserSeeder from seeders manually otherwise it won't work!
        $this->call([
            AdminUserSeeder::class,
        ]);

        //MedicationSeeder
        $this->call([
            MedicationSeeder::class,
        ]);

        //ManufacturerSeeder
        /* Doesn't need one because it's being generated on the MedicationSeeder! */

        //Patients
        Patients::factory(20)->create();

        //Doctors
        Doctors::factory(20)->create();

        //Prescriptions
        Prescriptions::factory(20)->create();
        


    }
}
