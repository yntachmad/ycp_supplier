<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('provinces')->delete();
        $provinces = array(
            //1
            array('id' => 1, 'province' => "Bali"),
            //2
            array('id' => 2, 'province' => "Bangka Belitung"),
            //3
            array('id' => 3, 'province' => "Banten"),
            //4
            array('id' => 4, 'province' => "Bengkulu"),
            //5
            array('id' => 5, 'province' => "Daerah Istimewa Yogyakarta"),
            //6
            array('id' => 6, 'province' => "DKI Jakarta"),
            array('id' => 7, 'province' => "Gorontalo"),
            array('id' => 8, 'province' => "Jambi"),
            array('id' => 9, 'province' => "Jawa Barat"),
            array('id' => 10, 'province' => "Jawa Tengah"),
            array('id' => 11, 'province' => "Jawa Timur"),
            array('id' => 12, 'province' => "Kalimantan Barat"),
            array('id' => 13, 'province' => "Kalimantan Selatan"),
            array('id' => 14, 'province' => "Kalimantan Tengah"),
            array('id' => 15, 'province' => "Kalimantan Timur"),
            array('id' => 16, 'province' => "Kalimantan Utara"),
            array('id' => 17, 'province' => "Kepulauan Riau"),
            array('id' => 18, 'province' => "Lampung"),
            array('id' => 19, 'province' => "Maluku"),
            array('id' => 20, 'province' => "Maluku Utara"),
            array('id' => 21, 'province' => "Nanggroe Aceh Darussalam"),
            array('id' => 22, 'province' => "Nusa Tenggara Barat"),
            array('id' => 23, 'province' => "Nusa Tenggara Timur"),
            array('id' => 24, 'province' => "Papua"),
            array('id' => 25, 'province' => "Papua Barat"),
            array('id' => 26, 'province' => "Riau"),
            array('id' => 27, 'province' => "Sulawesi Barat"),
            array('id' => 28, 'province' => "Sulawesi Selatan"),
            array('id' => 29, 'province' => "Sulawesi Tengah"),
            array('id' => 30, 'province' => "Sulawesi Tenggara"),
            array('id' => 31, 'province' => "Sulawesi Utara"),
            array('id' => 32, 'province' => "Sumatera Barat"),
            array('id' => 33, 'province' => "Sumatera Selatan"),
            array('id' => 34, 'province' => "Sumatera Utara"),
        );
        DB::table('provinces')->insert($provinces);
    }
}
