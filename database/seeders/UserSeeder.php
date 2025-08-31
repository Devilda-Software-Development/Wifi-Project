<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            'name' => 'daffa',
            'email' => 'daffa@gmail.com',
            'password' => bcrypt('1'),
            'role_id' => 2,
        ]);

        User::insert([
            'name' => 'Ilham Ibnu Ahmad',
            'email' => 'ilham@gmail.com',
            'password' => bcrypt('1'),
            'role_id' => 2,
        ]);

        User::insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('1'),
            'role_id' => 1,
        ]);
    }
}
