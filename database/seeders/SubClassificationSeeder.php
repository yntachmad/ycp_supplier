<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubClassificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sub_classifications')->insert([
            'classification_id' => 2,
            'subclassification_name' => 'Branding material',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        DB::table('sub_classifications')->insert([
            'classification_id' => 2,
            'subclassification_name' => 'Printing material',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        DB::table('sub_classifications')->insert([
            'classification_id' => 16,
            'subclassification_name' => 'Internet Service Provider',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        DB::table('sub_classifications')->insert([
            'classification_id' => 16,
            'subclassification_name' => 'Hardware / Software Equipment',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);

    }
}
