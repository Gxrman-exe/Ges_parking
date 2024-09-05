<?php

namespace Database\Seeders;

use App\Models\PaymentHistory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PaymentHistory::factory()->count(100)->create();
    }
}
