<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // untuk membuat data dummi atau data acar secara otomatis
        $user = [
            [
                'name' => 'Admin',
                'email' => 'jeckrissen@gmail.com',
                'telepon' => '085200738097',
                'password' => bcrypt('12345'),
                'alamat_user' => 'Gondokusuman',
                'is_admin' => '1',
            ],
            [
                'name' => 'User',
                'email' => 'user@gmail.com',
                'telepon' => '082200738097',
                'password' => bcrypt('12345'),
                'alamat_user' => 'Gondokusuman',
                'is_admin' => '0',
            ]
            ];
            foreach ($user as $key => $value) {
                User::create($value);
            }
    }
}
