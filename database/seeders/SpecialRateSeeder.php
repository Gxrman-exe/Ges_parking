<?php

namespace Database\Seeders;

use App\Models\SpecialRate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecialRateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SpecialRate::factory()->count(100)->create();
    }
}
