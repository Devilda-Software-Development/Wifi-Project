<?php

namespace Database\Seeders;

use App\Models\Complaint;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ComplaintSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Complaint::insert([
            [
                'user_id' => 2,
                'service_id' => 1,
                'subject' => 'Internet Lambat',
                'description' => 'Koneksi sering putus-putus.',
                'status' => 'open',
                'created_at' => now()->subDays(3),
            ],
            [
                'user_id' => 1,
                'service_id' => 2,
                'subject' => 'Tagihan Tidak Sesuai',
                'description' => 'Jumlah tagihan lebih besar dari biasanya.',
                'status' => 'closed',
                'created_at' => now()->subDays(7),
            ]
        ]);
    }
}
