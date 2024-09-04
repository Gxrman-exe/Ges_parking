<?php

namespace Database\Seeders;

use App\Models\VehicleClient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VehicleClient::factory()->count(5)->create();
    }
}
