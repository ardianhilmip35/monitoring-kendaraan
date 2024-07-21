<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $branch = [
            [
                'region' => 'Jakarta',
                'address' => 'DKI Jakarta',
                'role_branch' => 'Kantor Pusat'
            ],
            [
                'region' => 'Malang',
                'address' => 'Malang, Jawa Timur',
                'role_branch' => 'Kantor Cabang'
            ],
            [
                'region' => 'Kalimantan Timur',
                'address' => 'Kabupaten Kutai Kartanegara, Kalimantan Timur',
                'role_branch' => 'Tambang'
            ]
        ];

        Branch::insert($branch);
    }
}
