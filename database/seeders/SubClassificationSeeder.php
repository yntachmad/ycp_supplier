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
        //1
        DB::table('sub_classifications')->insert([
            'classification_id' => 9,
            'subclassification_name' => 'Hardware Equipment',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        //2
        DB::table('sub_classifications')->insert([
            'classification_id' => 13,
            'subclassification_name' => 'Medical Consumables',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        //3
        DB::table('sub_classifications')->insert([
            'classification_id' => 18,
            'subclassification_name' => 'Maintenance Vehicles',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        //4
        DB::table('sub_classifications')->insert([
            'classification_id' => 26,
            'subclassification_name' => 'Handling',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        //5
        DB::table('sub_classifications')->insert([
            'classification_id' => 24,
            'subclassification_name' => 'Rental vehicles ',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        //6
        DB::table('sub_classifications')->insert([
            'classification_id' => 24,
            'subclassification_name' => 'Shipping',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        //7
        DB::table('sub_classifications')->insert([
            'classification_id' => 7,
            'subclassification_name' => 'International wide Expedition',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        //8
        DB::table('sub_classifications')->insert([
            'classification_id' => 24,
            'subclassification_name' => 'Car Dealer',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        //9
        DB::table('sub_classifications')->insert([
            'classification_id' => 6,
            'subclassification_name' => 'Research',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        //10
        DB::table('sub_classifications')->insert([
            'classification_id' => 6,
            'subclassification_name' => 'Design / Drawing',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        //11
        DB::table('sub_classifications')->insert([
            'classification_id' => 11,
            'subclassification_name' => 'Financial Services',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        //12
        DB::table('sub_classifications')->insert([
            'classification_id' => 5,
            'subclassification_name' => 'Materials',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        //13
        DB::table('sub_classifications')->insert([
            'classification_id' => 16,
            'subclassification_name' => 'Mobile & Visual equipment',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        //14
        DB::table('sub_classifications')->insert([
            'classification_id' => 20,
            'subclassification_name' => 'NFI and Non NFI',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        //15
        DB::table('sub_classifications')->insert([
            'classification_id' => 4,
            'subclassification_name' => 'Radio Broadcasting & Transmitting',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        //16
        DB::table('sub_classifications')->insert([
            'classification_id' => 4,
            'subclassification_name' => 'Radio Broadcasting & Transmitting',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        //17
        DB::table('sub_classifications')->insert([
            'classification_id' => 18,
            'subclassification_name' => 'Maintenance Office Furniture and Equipment',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        //18
        DB::table('sub_classifications')->insert([
            'classification_id' => 4,
            'subclassification_name' => 'Printing material',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        //19
        DB::table('sub_classifications')->insert([
            'classification_id' => 14,
            'subclassification_name' => 'Meeting Package and accommodation',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        //20
        DB::table('sub_classifications')->insert([
            'classification_id' => 19,
            'subclassification_name' => 'Stationary',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        //21
        DB::table('sub_classifications')->insert([
            'classification_id' => 24,
            'subclassification_name' => 'Fuel Station Service',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        //22
        DB::table('sub_classifications')->insert([
            'classification_id' => 5,
            'subclassification_name' => 'Construction Equipment',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        //23
        DB::table('sub_classifications')->insert([
            'classification_id' => 16,
            'subclassification_name' => 'Internet service provider',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        //24
        DB::table('sub_classifications')->insert([
            'classification_id' => 9,
            'subclassification_name' => 'Electrical Items',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        //25
        DB::table('sub_classifications')->insert([
            'classification_id' => 22,
            'subclassification_name' => 'Security services',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        //26
        DB::table('sub_classifications')->insert([
            'classification_id' => 4,
            'subclassification_name' => 'Agency',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        //27
        DB::table('sub_classifications')->insert([
            'classification_id' => 18,
            'subclassification_name' => 'Vehicles spare part',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        //28
        DB::table('sub_classifications')->insert([
            'classification_id' => 27,
            'subclassification_name' => 'Material',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        //29
        DB::table('sub_classifications')->insert([
            'classification_id' => 13,
            'subclassification_name' => 'First Aid Kit',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        //30
        DB::table('sub_classifications')->insert([
            'classification_id' => 9,
            'subclassification_name' => 'Appliances',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        //31
        DB::table('sub_classifications')->insert([
            'classification_id' => 5,
            'subclassification_name' => 'Construction Material',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        //32
        DB::table('sub_classifications')->insert([
            'classification_id' => 15,
            'subclassification_name' => 'Insurance broker',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        //33
        DB::table('sub_classifications')->insert([
            'classification_id' => 24,
            'subclassification_name' => 'Insurance broker',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        //34
        DB::table('sub_classifications')->insert([
            'classification_id' => 5,
            'subclassification_name' => 'Civil Construction',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);



    }
}
