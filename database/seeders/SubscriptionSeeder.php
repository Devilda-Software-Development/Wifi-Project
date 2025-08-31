<?php

namespace Database\Seeders;

use App\Models\Subscription;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subscription::insert([
            [
                'user_id' => 2,
                'service_id' => 1,
                'start_date' => now()->subMonths(2)->toDateString(),
                'status' => 'active',
                'created_at' => now()->subMonths(2),
            ],
            [
                'user_id' => 3,
                'service_id' => 2,
                'start_date' => now()->subMonth()->toDateString(),
                'status' => 'active',
                'created_at' => now()->subMonth(),
            ]
        ]);
    }
}
