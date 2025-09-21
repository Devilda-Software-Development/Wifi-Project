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
        $fakePelanggan = User::factory(10)->create();
        $fakePelanggan->each(function ($user) {
            $user->assignRole(User::ROLE_PELANGGAN);
        });

        $superadmin = User::factory()->create([
            'name' => 'Superadmin',
            'email' => 'superadmin@example.com',
        ]);

        $superadmin->assignRole(User::ROLE_SUPERADMIN);

        $adminKoordinator = User::factory()->create([
            'name' => 'Admin Koordinator',
            'email' => 'koordinator@example.com',
        ]);

        $adminKoordinator->assignRole(User::ROLE_ADMIN_KOORDINATOR);

        $adminFinance = User::factory()->create([
            'name' => 'Admin Finance',
            'email' => 'finance@example.com',
        ]);

        $adminFinance->assignRole(User::ROLE_ADMIN_FINANCE);
    }
}