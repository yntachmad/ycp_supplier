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
<<<<<<< HEAD
            'username' => 'administrator',
            'role' => 'admin',
=======
            'username' => 'admin',
>>>>>>> 85af11072f2a8cad545bf6d75264c5e36a0ccf87
            'password' => Hash::make('123456'),
            'role' => 'admin',
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
