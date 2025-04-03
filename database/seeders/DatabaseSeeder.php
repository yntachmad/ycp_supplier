<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@test.com',
            'username' => 'administrator',
            'role' => 'admin',
            'password' => Hash::make('123456'),

        ]);

        $this->call([
            BankSeeder::class,
            CategorySeeder::class,
            ClassificationSeeder::class,
            CompanyTypeSeeder::class,
            GroupSeeder::class,
            SubClassificationSeeder::class,
            ProvinceSeeder::class,
            CitySeeder::class,

        ]);
    }
}
