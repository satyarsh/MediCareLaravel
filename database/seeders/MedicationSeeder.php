<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MedicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $medications = [
            [
                'Name' => 'Amoxicillin',
                'GenericName' => 'Amoxicillin',
                'Manufacturer' => 'Apotex Corp',
                'Form' => 'Capsule',
                'Strength' => '500mg',
                'RequiresPrescription' => true,
                'DefaultUnitPrice' => 5.99,
            ],
            [
                'Name' => 'Lisinopril',
                'GenericName' => 'Lisinopril',
                'Manufacturer' => 'Bristol-Myers Squibb',
                'Form' => 'Tablet',
                'Strength' => '20mg',
                'RequiresPrescription' => true,
                'DefaultUnitPrice' => 7.49,
            ],
            [
                'Name' => 'Atorvastatin',
                'GenericName' => 'Atorvastatin',
                'Manufacturer' => 'Pfizer',
                'Form' => 'Tablet',
                'Strength' => '40mg',
                'RequiresPrescription' => true,
                'DefaultUnitPrice' => 12.99,
            ],
            [
                'Name' => 'Levothyroxine',
                'GenericName' => 'Levothyroxine',
                'Manufacturer' => 'Mylan',
                'Form' => 'Tablet',
                'Strength' => '100mcg',
                'RequiresPrescription' => true,
                'DefaultUnitPrice' => 6.79,
            ],
            [
                'Name' => 'Metformin',
                'GenericName' => 'Metformin',
                'Manufacturer' => 'Merck',
                'Form' => 'Tablet',
                'Strength' => '500mg',
                'RequiresPrescription' => true,
                'DefaultUnitPrice' => 8.29,
            ],
            [
                'Name' => 'Simvastatin',
                'GenericName' => 'Simvastatin',
                'Manufacturer' => 'Teva Pharmaceutical',
                'Form' => 'Tablet',
                'Strength' => '20mg',
                'RequiresPrescription' => true,
                'DefaultUnitPrice' => 9.49,
            ],
            [
                'Name' => 'Omeprazole',
                'GenericName' => 'Omeprazole',
                'Manufacturer' => 'AstraZeneca',
                'Form' => 'Capsule',
                'Strength' => '20mg',
                'RequiresPrescription' => false,
                'DefaultUnitPrice' => 4.99,
            ],
            [
                'Name' => 'Amlodipine',
                'GenericName' => 'Amlodipine',
                'Manufacturer' => 'Novartis',
                'Form' => 'Tablet',
                'Strength' => '5mg',
                'RequiresPrescription' => true,
                'DefaultUnitPrice' => 11.79,
            ],
            [
                'Name' => 'Albuterol',
                'GenericName' => 'Albuterol',
                'Manufacturer' => 'Merck',
                'Form' => 'Inhaler',
                'Strength' => '90mcg/actuation',
                'RequiresPrescription' => true,
                'DefaultUnitPrice' => 24.99,
            ],
            [
                'Name' => 'Hydrochlorothiazide',
                'GenericName' => 'Hydrochlorothiazide',
                'Manufacturer' => 'Mylan',
                'Form' => 'Tablet',
                'Strength' => '25mg',
                'RequiresPrescription' => true,
                'DefaultUnitPrice' => 5.29,
            ],
            [
                'Name' => 'Sertraline',
                'GenericName' => 'Sertraline',
                'Manufacturer' => 'Pfizer',
                'Form' => 'Tablet',
                'Strength' => '50mg',
                'RequiresPrescription' => true,
                'DefaultUnitPrice' => 10.49,
            ],
            [
                'Name' => 'Montelukast',
                'GenericName' => 'Montelukast',
                'Manufacturer' => 'Merck',
                'Form' => 'Tablet',
                'Strength' => '10mg',
                'RequiresPrescription' => true,
                'DefaultUnitPrice' => 13.29,
            ],
            [
                'Name' => 'Furosemide',
                'GenericName' => 'Furosemide',
                'Manufacturer' => 'Sanofi',
                'Form' => 'Tablet',
                'Strength' => '40mg',
                'RequiresPrescription' => true,
                'DefaultUnitPrice' => 7.99,
            ],
            [
                'Name' => 'Escitalopram',
                'GenericName' => 'Escitalopram',
                'Manufacturer' => 'Allergan',
                'Form' => 'Tablet',
                'Strength' => '10mg',
                'RequiresPrescription' => true,
                'DefaultUnitPrice' => 11.49,
            ],
            [
                'Name' => 'Pantoprazole',
                'GenericName' => 'Pantoprazole',
                'Manufacturer' => 'Takeda',
                'Form' => 'Tablet',
                'Strength' => '40mg',
                'RequiresPrescription' => false,
                'DefaultUnitPrice' => 6.29,
            ],
            [
                'Name' => 'Citalopram',
                'GenericName' => 'Citalopram',
                'Manufacturer' => 'H Lundbeck A/S',
                'Form' => 'Tablet',
                'Strength' => '20mg',
                'RequiresPrescription' => true,
                'DefaultUnitPrice' => 9.79,
            ],
            [
                'Name' => 'Tramadol',
                'GenericName' => 'Tramadol',
                'Manufacturer' => 'Grunenthal',
                'Form' => 'Tablet',
                'Strength' => '50mg',
                'RequiresPrescription' => true,
                'DefaultUnitPrice' => 14.99,
            ],
            [
                'Name' => 'Warfarin',
                'GenericName' => 'Warfarin',
                'Manufacturer' => 'Bristol-Myers Squibb',
                'Form' => 'Tablet',
                'Strength' => '5mg',
                'RequiresPrescription' => true,
                'DefaultUnitPrice' => 8.49,
            ],
            [
                'Name' => 'Trazodone',
                'GenericName' => 'Trazodone',
                'Manufacturer' => 'Angelini Pharma',
                'Form' => 'Tablet',
                'Strength' => '50mg',
                'RequiresPrescription' => true,
                'DefaultUnitPrice' => 10.99,
            ],
            [
                'Name' => 'Gabapentin',
                'GenericName' => 'Gabapentin',
                'Manufacturer' => 'Pfizer',
                'Form' => 'Capsule',
                'Strength' => '300mg',
                'RequiresPrescription' => true,
                'DefaultUnitPrice' => 12.29,
            ],
        ];

        $faker = Faker::create('fa_IR');

        //Debugging
        #$phoneNumber = $faker->phoneNumber;
        #$phoneNumber = $faker->unique()->phoneNumber();
        #echo "Generated Phone Number: " . $phoneNumber . "\n";
        #echo "Truncated Phone Number: " . substr($phoneNumber, 0, 15) . "\n";

        foreach ($medications as $medicationData) {

            $manufacturerId = DB::table('manufacturers')->insertGetId([
                'Name' => $medicationData['Manufacturer'],
                'ContactPhone' => $faker->unique()->phoneNumber()
            ]);

            DB::table('medications')->insert([
                'Name' => $medicationData['Name'],
                'GenericName' => $medicationData['GenericName'],
                'Strength' => $medicationData['Strength'],
                'Form' => $medicationData['Form'],
                'ManufacturerID' => $manufacturerId,
                'RequiresPrescription' => $medicationData['RequiresPrescription'],
                'DefaultUnitPrice' => $medicationData['DefaultUnitPrice'],
            ]);
        }
    }
}
