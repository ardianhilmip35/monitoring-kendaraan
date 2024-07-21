<?php

namespace Database\Seeders;

use App\Models\Driver;
use Illuminate\Database\Seeder;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $driver = [
            [
                'name' => 'Hermanto Kurniawan',
                'address' => 'Riau',
                'gender' => 'Laki-Laki',
            ],
            [
                'name' => 'Doddy',
                'address' => 'Surakarta',
                'gender' => 'Laki-Laki',
            ]
        ];

        Driver::insert($driver);
    }
}
