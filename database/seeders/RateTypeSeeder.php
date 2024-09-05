<?php

namespace Database\Seeders;

use App\Models\RateType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RateTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RateType::factory()->count(100)->create();
    }
}
