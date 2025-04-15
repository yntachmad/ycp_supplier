<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClassificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //1
        DB::table('classifications')->insert([
            'classification_name' => 'Administration',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        //2
        DB::table('classifications')->insert([
            'classification_name' => 'Branding',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        //3
        DB::table('classifications')->insert([
            'classification_name' => 'Catering',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        //4
        DB::table('classifications')->insert([
            'classification_name' => 'Communication',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        //5
        DB::table('classifications')->insert([
            'classification_name' => 'Construction',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        //6
        DB::table('classifications')->insert([
            'classification_name' => 'Consultancy',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        //7
        DB::table('classifications')->insert([
            'classification_name' => 'Customs Clearance',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        //8
        DB::table('classifications')->insert([
            'classification_name' => 'Educational Institution',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        //9
        DB::table('classifications')->insert([
            'classification_name' => 'Equipment',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        //10
        DB::table('classifications')->insert([
            'classification_name' => 'Finance',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        //11
        DB::table('classifications')->insert([
            'classification_name' => 'FSP',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        //12
        DB::table('classifications')->insert([
            'classification_name' => 'Furniture',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        //13
        DB::table('classifications')->insert([
            'classification_name' => 'Health',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        //14
        DB::table('classifications')->insert([
            'classification_name' => 'Hotel',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        //15
        DB::table('classifications')->insert([
            'classification_name' => 'Insurance',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        //16
        DB::table('classifications')->insert([
            'classification_name' => 'IT and Telecommunication',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        //17
        DB::table('classifications')->insert([
            'classification_name' => 'Legal Services',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        //18
        DB::table('classifications')->insert([
            'classification_name' => 'Maintenance',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        //19
        DB::table('classifications')->insert([
            'classification_name' => 'Office Supplies',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        //20
        DB::table('classifications')->insert([
            'classification_name' => 'Relief Items',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        //21
        DB::table('classifications')->insert([
            'classification_name' => 'Renovation',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        //22
        DB::table('classifications')->insert([
            'classification_name' => 'Security',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        //23
        DB::table('classifications')->insert([
            'classification_name' => 'Translations',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        //24
        DB::table('classifications')->insert([
            'classification_name' => 'Transportation',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        //25
        DB::table('classifications')->insert([
            'classification_name' => 'Travel',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        //26
        DB::table('classifications')->insert([
            'classification_name' => 'Warehousing',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        //27
        DB::table('classifications')->insert([
            'classification_name' => 'Water and Sanitation',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);

    }
}
