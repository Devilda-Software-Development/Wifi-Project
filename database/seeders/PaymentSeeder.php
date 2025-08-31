<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Payment;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Payment::insert([
            [
                'bill_id' => 1,
                'amount' => 150000,
                'paid_at' => now()->subMonth(2)->addDays(2),
                'method' => 'transfer',
                'created_at' => now()->subMonth(2)->addDays(2),
            ],
            [
                'bill_id' => 3,
                'amount' => 250000,
                'paid_at' => now()->subMonth()->addDays(1),
                'method' => 'cash',
                'created_at' => now()->subMonth()->addDays(1),
            ]
        ]);
    }
}
