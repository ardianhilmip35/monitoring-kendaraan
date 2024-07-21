<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'name' => 'Admin',
                'username' => 'superadmin',
                'role' => 'admin',
                'password' => bcrypt('123'),
            ],
            [
                'name' => 'Penjabat',
                'username' => 'penjabat',
                'role' => 'penjabat',
                'password' => bcrypt('123'),
            ],
            [
                'name' => 'Wakil Penjabat',
                'username' => 'wakil-penjabat',
                'role' => 'penjabat',
                'password' => bcrypt('123'),
            ]
        ];

        User::insert($user);
    }
}
