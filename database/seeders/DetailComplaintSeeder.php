<?php

namespace Database\Seeders;

use App\Models\DetailComplaint;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DetailComplaintSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DetailComplaint::insert([
            [
                'complaint_id' => 1,
                'user_id' => 1,
                'message' => 'Mohon segera dibenahi.',
                'created_at' => now()->subDays(3),
            ],
            [
                'complaint_id' => 1,
                'user_id' => 3,
                'message' => 'Akan kami cek, mohon tunggu.',
                'created_at' => now()->subDays(2),
            ],
            [
                'complaint_id' => 2,
                'user_id' => 3,
                'message' => 'Mohon penjelasannya.',
                'created_at' => now()->subDays(7),
            ],
            [
                'complaint_id' => 2,
                'user_id' => 2,
                'message' => 'Tagihan sudah dikoreksi.',
                'created_at' => now()->subDays(6),
            ]
        ]);
    }
}
