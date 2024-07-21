<?php

namespace Database\Seeders;

use App\Models\Transportation;
use Illuminate\Database\Seeder;

class TransportationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $transportation = [
            [
                'name' => 'Muso',
                'product_type' => 'AA09',
                'transportation_type' => 'Angkutan Orang',
                'fuel' => '25',
            ],
            [
                'name' => 'Suzuki',
                'product_type' => 'AA09',
                'transportation_type' => 'Angkutan Barang',
                'fuel' => '25',
            ]
        ];

        Transportation::insert($transportation);
    }
}
