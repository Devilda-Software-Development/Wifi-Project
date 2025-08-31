<?php

namespace Database\Seeders;

use App\Models\Bill;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bill::insert([
            [
                'subscription_id' => 1,
                'bill_date' => now()->subMonth(2)->toDateString(),
                'due_date' => now()->subMonth(2)->addDays(7)->toDateString(),
                'amount' => 150000,
                'paid_at' => now()->subMonth(2)->addDays(2),
                'status' => 'paid',
                'created_at' => now()->subMonth(2),
            ],
            [
                'subscription_id' => 1,
                'bill_date' => now()->subMonth()->toDateString(),
                'due_date' => now()->subMonth()->addDays(7)->toDateString(),
                'amount' => 150000,
                'paid_at' => null,
                'status' => 'unpaid',
                'created_at' => now()->subMonth(),
            ],
            [
                'subscription_id' => 2,
                'bill_date' => now()->subMonth()->toDateString(),
                'due_date' => now()->subMonth()->addDays(7)->toDateString(),
                'amount' => 250000,
                'paid_at' => now()->subMonth()->addDays(1),
                'status' => 'paid',
                'created_at' => now()->subMonth(),
            ]
        ]);
    }
}
