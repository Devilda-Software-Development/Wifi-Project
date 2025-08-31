<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::insert([
            [
                'name' => 'Paket 10Mbps',
                'price' => 150000,
                'created_at' => now(),
            ],
            [
                'name' => 'Paket 20Mbps',
                'price' => 250000,
                'created_at' => now(),
            ]
        ]);
    }
}
