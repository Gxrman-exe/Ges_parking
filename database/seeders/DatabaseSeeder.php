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
        $this->call([

            CountrySeeder::class,
            DepartamentSeeder::class,
            CitySeeder::class,
            LocalSeeder::class,
            ClientSeeder::class,
            VehicleSeeder::class,

            RateTypeSeeder::class,
            PaymentMethodSeeder::class,
            SpecialRateSeeder::class,
            PaymentSeeder::class,
            PaymentHistorySeeder::class,

            RoleSeeder::class,
            PermissionSeeder::class,
            RolePermissionSeeder::class,
            UserSeeder::class,
            RegisterSeeder::class,
        ]);
    }
}
