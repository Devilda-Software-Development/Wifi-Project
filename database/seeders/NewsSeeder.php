<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        News::insert([
            [
                'title' => 'Peningkatan Layanan Internet',
                'content' => 'Kami telah melakukan peningkatan pada jaringan internet untuk memberikan layanan yang lebih baik.',
                'slug' => 'peningkatan-layanan-internet',
                'created_at' => now(),
            ],
            [
                'title' => 'Promo Paket Hemat',
                'content' => 'Dapatkan diskon 20% untuk paket internet selama 6 bulan pertama.',
                'slug' => 'promo-paket-hemat',
                'created_at' => now(),
            ]
        ]);
    }
}
