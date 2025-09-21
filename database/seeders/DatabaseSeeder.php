<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // RoleSeeder::class,
            RoleAndPermissionSeeder::class,
            UserSeeder::class,
            ServiceSeeder::class,
            SubscriptionSeeder::class,
            ComplaintSeeder::class,
            DetailComplaintSeeder::class,
            BillSeeder::class,
            PaymentSeeder::class,
            NewsSeeder::class,
        ]);
    }
}