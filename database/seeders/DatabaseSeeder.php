<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->count(100)->create();
        $this->call([
            CountrySeeder::class,
            DepartamentSeeder::class,
            CitySeeder::class,
            LocalSeeder::class,
            ClientSeeder::class,
            VehicleSeeder::class,
            PaymentMethodSeeder::class,
            SpecialRateSeeder::class,
            RateTypeSeeder::class,
            PaymentSeeder::class,
            PaymentHistorySeeder::class,
            RegisterSeeder::class,
            RoleSeeder::class,
            PermissionSeeder::class,
            RolePermissionSeeder::class,
        ]);
    }
}
