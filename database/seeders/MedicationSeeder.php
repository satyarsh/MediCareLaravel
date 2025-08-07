<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MedicationSeeder extends Seeder
{
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
                'Stock' => 150
            ],
            [
                'Name' => 'Lisinopril',
                'GenericName' => 'Lisinopril',
                'Manufacturer' => 'Bristol-Myers Squibb',
                'Form' => 'Tablet',
                'Strength' => '20mg',
                'RequiresPrescription' => true,
                'DefaultUnitPrice' => 7.49,
                'Stock' => 200
            ],
            [
                'Name' => 'Atorvastatin',
                'GenericName' => 'Atorvastatin',
                'Manufacturer' => 'Pfizer',
                'Form' => 'Tablet',
                'Strength' => '40mg',
                'RequiresPrescription' => true,
                'DefaultUnitPrice' => 12.99,
                'Stock' => 89
            ],
            [
                'Name' => 'Levothyroxine',
                'GenericName' => 'Levothyroxine',
                'Manufacturer' => 'Mylan',
                'Form' => 'Tablet',
                'Strength' => '100mcg',
                'RequiresPrescription' => true,
                'DefaultUnitPrice' => 6.79,
                'Stock' => 75
            ],
            [
                'Name' => 'Metformin',
                'GenericName' => 'Metformin',
                'Manufacturer' => 'Merck',
                'Form' => 'Tablet',
                'Strength' => '500mg',
                'RequiresPrescription' => true,
                'DefaultUnitPrice' => 8.29,
                'Stock' => 120
            ],
            [
                'Name' => 'Simvastatin',
                'GenericName' => 'Simvastatin',
                'Manufacturer' => 'Teva Pharmaceutical',
                'Form' => 'Tablet',
                'Strength' => '20mg',
                'RequiresPrescription' => true,
                'DefaultUnitPrice' => 9.49,
                'Stock' => 95
            ],
            [
                'Name' => 'Omeprazole',
                'GenericName' => 'Omeprazole',
                'Manufacturer' => 'AstraZeneca',
                'Form' => 'Capsule',
                'Strength' => '20mg',
                'RequiresPrescription' => false,
                'DefaultUnitPrice' => 4.99,
                'Stock' => 180
            ],
            [
                'Name' => 'Amlodipine',
                'GenericName' => 'Amlodipine',
                'Manufacturer' => 'Novartis',
                'Form' => 'Tablet',
                'Strength' => '5mg',
                'RequiresPrescription' => true,
                'DefaultUnitPrice' => 11.79,
                'Stock' => 65
            ],
            [
                'Name' => 'Albuterol',
                'GenericName' => 'Albuterol',
                'Manufacturer' => 'Merck',
                'Form' => 'Inhaler',
                'Strength' => '90mcg/actuation',
                'RequiresPrescription' => true,
                'DefaultUnitPrice' => 24.99,
                'Stock' => 45
            ],
            [
                'Name' => 'Hydrochlorothiazide',
                'GenericName' => 'Hydrochlorothiazide',
                'Manufacturer' => 'Mylan',
                'Form' => 'Tablet',
                'Strength' => '25mg',
                'RequiresPrescription' => true,
                'DefaultUnitPrice' => 5.29,
                'Stock' => 110
            ],
            [
                'Name' => 'Sertraline',
                'GenericName' => 'Sertraline',
                'Manufacturer' => 'Pfizer',
                'Form' => 'Tablet',
                'Strength' => '50mg',
                'RequiresPrescription' => true,
                'DefaultUnitPrice' => 10.49,
                'Stock' => 88
            ],
            [
                'Name' => 'Montelukast',
                'GenericName' => 'Montelukast',
                'Manufacturer' => 'Merck',
                'Form' => 'Tablet',
                'Strength' => '10mg',
                'RequiresPrescription' => true,
                'DefaultUnitPrice' => 13.29,
                'Stock' => 72
            ],
            [
                'Name' => 'Furosemide',
                'GenericName' => 'Furosemide',
                'Manufacturer' => 'Sanofi',
                'Form' => 'Tablet',
                'Strength' => '40mg',
                'RequiresPrescription' => true,
                'DefaultUnitPrice' => 7.99,
                'Stock' => 135
            ],
            [
                'Name' => 'Escitalopram',
                'GenericName' => 'Escitalopram',
                'Manufacturer' => 'Allergan',
                'Form' => 'Tablet',
                'Strength' => '10mg',
                'RequiresPrescription' => true,
                'DefaultUnitPrice' => 11.49,
                'Stock' => 93
            ],
            [
                'Name' => 'Pantoprazole',
                'GenericName' => 'Pantoprazole',
                'Manufacturer' => 'Takeda',
                'Form' => 'Tablet',
                'Strength' => '40mg',
                'RequiresPrescription' => false,
                'DefaultUnitPrice' => 6.29,
                'Stock' => 160
            ],
            [
                'Name' => 'Citalopram',
                'GenericName' => 'Citalopram',
                'Manufacturer' => 'H Lundbeck A/S',
                'Form' => 'Tablet',
                'Strength' => '20mg',
                'RequiresPrescription' => true,
                'DefaultUnitPrice' => 9.79,
                'Stock' => 78
            ],
            [
                'Name' => 'Tramadol',
                'GenericName' => 'Tramadol',
                'Manufacturer' => 'Grunenthal',
                'Form' => 'Tablet',
                'Strength' => '50mg',
                'RequiresPrescription' => true,
                'DefaultUnitPrice' => 14.99,
                'Stock' => 42
            ],
            [
                'Name' => 'Warfarin',
                'GenericName' => 'Warfarin',
                'Manufacturer' => 'Bristol-Myers Squibb',
                'Form' => 'Tablet',
                'Strength' => '5mg',
                'RequiresPrescription' => true,
                'DefaultUnitPrice' => 8.49,
                'Stock' => 67
            ],
            [
                'Name' => 'Trazodone',
                'GenericName' => 'Trazodone',
                'Manufacturer' => 'Angelini Pharma',
                'Form' => 'Tablet',
                'Strength' => '50mg',
                'RequiresPrescription' => true,
                'DefaultUnitPrice' => 10.99,
                'Stock' => 85
            ],
            [
                'Name' => 'Gabapentin',
                'GenericName' => 'Gabapentin',
                'Manufacturer' => 'Pfizer',
                'Form' => 'Capsule',
                'Strength' => '300mg',
                'RequiresPrescription' => true,
                'DefaultUnitPrice' => 12.29,
                'Stock' => 91
            ],
            [
                'Name' => 'Ibuprofen',
                'GenericName' => 'Ibuprofen',
                'Manufacturer' => 'Johnson & Johnson',
                'Form' => 'Tablet',
                'Strength' => '400mg',
                'RequiresPrescription' => false,
                'DefaultUnitPrice' => 3.99,
                'Stock' => 250
            ],
            [
                'Name' => 'Cetirizine',
                'GenericName' => 'Cetirizine',
                'Manufacturer' => 'UCB Pharma',
                'Form' => 'Tablet',
                'Strength' => '10mg',
                'RequiresPrescription' => false,
                'DefaultUnitPrice' => 5.49,
                'Stock' => 195
            ],
            [
                'Name' => 'Losartan',
                'GenericName' => 'Losartan',
                'Manufacturer' => 'Merck',
                'Form' => 'Tablet',
                'Strength' => '50mg',
                'RequiresPrescription' => true,
                'DefaultUnitPrice' => 9.99,
                'Stock' => 125
            ],
            [
                'Name' => 'Prednisone',
                'GenericName' => 'Prednisone',
                'Manufacturer' => 'Upjohn',
                'Form' => 'Tablet',
                'Strength' => '20mg',
                'RequiresPrescription' => true,
                'DefaultUnitPrice' => 4.79,
                'Stock' => 108
            ]
        ];

        $faker = Faker::create('en_US');

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('medications')->truncate();
        DB::table('manufacturers')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $createdManufacturers = [];

        foreach ($medications as $medicationData) {
            $manufacturerName = $medicationData['Manufacturer'];

            if (isset($createdManufacturers[$manufacturerName])) {
                $manufacturerId = $createdManufacturers[$manufacturerName];
            } else {
                $manufacturerId = DB::table('manufacturers')->insertGetId([
                    'Name' => $manufacturerName,
                    'ContactPhone' => $faker->unique()->phoneNumber()
                ]);
                $createdManufacturers[$manufacturerName] = $manufacturerId;
            }

            DB::table('medications')->insert([
                'Name' => $medicationData['Name'],
                'GenericName' => $medicationData['GenericName'],
                'Strength' => $medicationData['Strength'],
                'Form' => $medicationData['Form'],
                'ManufacturerID' => $manufacturerId,
                'RequiresPrescription' => $medicationData['RequiresPrescription'],
                'DefaultUnitPrice' => $medicationData['DefaultUnitPrice'],
                'Stock' => $medicationData['Stock']
            ]);
        }
    }
}
