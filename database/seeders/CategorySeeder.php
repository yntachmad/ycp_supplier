<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            'category_name' => 'Works',
            'category_description' => 'A category of procurement Works that refers to construction, repair, rehabilitation, demolition, restoration, maintenance of civil work structures',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        DB::table('categories')->insert([
            'category_name' => 'Goods',
            'category_description' => 'A category of procurement Goods are physical products purchased or manufactured on request',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        DB::table('categories')->insert([
            'category_name' => 'Services',
            'category_description' => 'A category of procurement services, the process and steps used to obtain supplies, materials, good and services, and contracts at best price',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
    }
}
