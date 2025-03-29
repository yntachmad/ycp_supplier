<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('cities')->delete();
        $districts = array(
            // begin::City for State Bali
            array('city' => "Kabupaten Badung", 'province_id' => 1),
            array('city' => "Kabupaten Bangli", 'province_id' => 1),
            array('city' => "Kabupaten Buleleng", 'province_id' => 1),
            array('city' => "Kabupaten Gianyar", 'province_id' => 1),
            array('city' => "Kabupaten Jembrana", 'province_id' => 1),
            array('city' => "Kabupaten Karangasem", 'province_id' => 1),
            array('city' => "Kabupaten Klungkung", 'province_id' => 1),
            array('city' => "Kabupaten Tabanan", 'province_id' => 1),
            array('city' => "Kota Denpasar", 'province_id' => 1),
            // end::City for State Bali

            // begin::City for Bangka Belitung
            array('city' => "Kabupaten Bangka", 'province_id' => 2),
            array('city' => "Kabupaten Bangka Barat", 'province_id' => 2),
            array('city' => "Kabupaten Bangka Selatan", 'province_id' => 2),
            array('city' => "Kabupaten Bangka Tengah", 'province_id' => 2),
            array('city' => "Kabupaten Belitung", 'province_id' => 2),
            array('city' => "Kabupaten Belitung Timur", 'province_id' => 2),
            array('city' => "Kota Pangkalpinang", 'province_id' => 2),
            // end::City for Bangka Belitung

            // begin::City for Banten
            array('city' => "Kabupaten Lebak", 'province_id' => 3),
            array('city' => "Kabupaten Pandeglang", 'province_id' => 3),
            array('city' => "Kabupaten Serang", 'province_id' => 3),
            array('city' => "Kabupaten Tangerang", 'province_id' => 3),
            array('city' => "Kota Cilegon", 'province_id' => 3),
            array('city' => "Kota Serang", 'province_id' => 3),
            array('city' => "Kota Tangerang", 'province_id' => 3),
            array('city' => "Kota Tangerang Selatan", 'province_id' => 3),
            // end::City for Banten

            // begin::City for Bengkulu
            array('city' => "Kabupaten Bengkulu Selatan", 'province_id' => 4),
            array('city' => "Kabupaten Bengkulu Tengah", 'province_id' => 4),
            array('city' => "Kabupaten Bengkulu Utara", 'province_id' => 4),
            array('city' => "Kabupaten Kaur", 'province_id' => 4),
            array('city' => "Kabupaten Kepahiang", 'province_id' => 4),
            array('city' => "Kabupaten Lebong", 'province_id' => 4),
            array('city' => "Kabupaten Mukomuko", 'province_id' => 4),
            array('city' => "Kabupaten Rejang Lebong", 'province_id' => 4),
            array('city' => "Kabupaten Seluma", 'province_id' => 4),
            array('city' => "Kota Bengkulu", 'province_id' => 4),
            // end::City for Bengkulu

            // begin::City for Daerah Istimewa Yogyakarta
            array('city' => "Kabupaten Bantul", 'province_id' => 5),
            array('city' => "Kabupaten Gunungkidul", 'province_id' => 5),
            array('city' => "Kabupaten Kulon Progo", 'province_id' => 5),
            array('city' => "Kabupaten Sleman", 'province_id' => 5),
            array('city' => "Kota Yogyakarta", 'province_id' => 5),
            // end::City for Daerah Istimewa Yogyakarta

            // begin::DKI Jakarta
            array('city' => "Jakarta Barat", 'province_id' => 6),
            array('city' => "Jakarta Pusat", 'province_id' => 6),
            array('city' => "Jakarta Selatan", 'province_id' => 6),
            array('city' => "Jakarta Timur", 'province_id' => 6),
            array('city' => "Jakarta Utara", 'province_id' => 6),
            array('city' => "Kepulauan Seribu", 'province_id' => 6),
            // end::DKI Jakarta

            // begin::City for Gorontalo
            array('city' => "Kabupaten Boalemo", 'province_id' => 7),
            array('city' => "Kabupaten Bone Bolango", 'province_id' => 7),
            array('city' => "Kabupaten Gorontalo", 'province_id' => 7),
            array('city' => "Kabupaten Gorontalo Utara", 'province_id' => 7),
            array('city' => "Kabupaten Pohuwato", 'province_id' => 7),
            array('city' => "Kota Gorontalo", 'province_id' => 7),
            // end::City for Gorontalo

            // begin::City for Jambi
            array('city' => "Kabupaten Batanghari", 'province_id' => 8),
            array('city' => "Kabupaten Bungo", 'province_id' => 8),
            array('city' => "Kabupaten Kerinci", 'province_id' => 8),
            array('city' => "Kabupaten Merangin", 'province_id' => 8),
            array('city' => "Kabupaten Muaro Jambi", 'province_id' => 8),
            array('city' => "Kabupaten Sarolangun", 'province_id' => 8),
            array('city' => "Kabupaten Tanjung Jabung Barat", 'province_id' => 8),
            array('city' => "Kabupaten Tanjung Jabung Timur", 'province_id' => 8),
            array('city' => "Kabupaten Tebo", 'province_id' => 8),
            array('city' => "Kota Jambi", 'province_id' => 8),
            array('city' => "Kota Sungai Penuh", 'province_id' => 8),
            // end::City for Jambi

            // begin::City for Jawa Barat
            array('city' => "Kabupaten Bandung", 'province_id' => 9),
            array('city' => "Kabupaten Bandung Barat", 'province_id' => 9),
            array('city' => "Kabupaten Bekasi", 'province_id' => 9),
            array('city' => "Kabupaten Bogor", 'province_id' => 9),
            array('city' => "Kabupaten Ciamis", 'province_id' => 9),
            array('city' => "Kabupaten Cianjur", 'province_id' => 9),
            array('city' => "Kabupaten Cirebon", 'province_id' => 9),
            array('city' => "Kabupaten Garut", 'province_id' => 9),
            array('city' => "Kabupaten Indramayu", 'province_id' => 9),
            array('city' => "Kabupaten Karawang", 'province_id' => 9),
            array('city' => "Kabupaten Kuningan", 'province_id' => 9),
            array('city' => "Kabupaten Majalengka", 'province_id' => 9),
            array('city' => "Kabupaten Pangandaran", 'province_id' => 9),
            array('city' => "Kabupaten Purwakarta", 'province_id' => 9),
            array('city' => "Kabupaten Subang", 'province_id' => 9),
            array('city' => "Kabupaten Sukabumi", 'province_id' => 9),
            array('city' => "Kabupaten Sumedang", 'province_id' => 9),
            array('city' => "Kabupaten Tasikmalaya", 'province_id' => 9),
            array('city' => "Kota Bandung", 'province_id' => 9),
            array('city' => "Kota Banjar", 'province_id' => 9),
            array('city' => "Kota Bekasi", 'province_id' => 9),
            array('city' => "Kota Bogor", 'province_id' => 9),
            array('city' => "Kota Cimahi", 'province_id' => 9),
            array('city' => "Kota Cirebon", 'province_id' => 9),
            array('city' => "Kota Depok", 'province_id' => 9),
            array('city' => "Kota Sukabumi", 'province_id' => 9),
            array('city' => "Kota Tasikmalaya", 'province_id' => 9),
            // end::City for Jawa Barat

            // begin::City for Jawa Tengah
            array('city' => "Kabupaten Banjarnegara", 'province_id' => 10),
            array('city' => "Kabupaten Banyumas", 'province_id' => 10),
            array('city' => "Kabupaten Batang", 'province_id' => 10),
            array('city' => "Kabupaten Blora", 'province_id' => 10),
            array('city' => "Kabupaten Boyolali", 'province_id' => 10),
            array('city' => "Kabupaten Brebes", 'province_id' => 10),
            array('city' => "Kabupaten Cilacap", 'province_id' => 10),
            array('city' => "Kabupaten Demak", 'province_id' => 10),
            array('city' => "Kabupaten Grobogan", 'province_id' => 10),
            array('city' => "Kabupaten Jepara", 'province_id' => 10),
            array('city' => "Kabupaten Karanganyar", 'province_id' => 10),
            array('city' => "Kabupaten Kebumen", 'province_id' => 10),
            array('city' => "Kabupaten Kendal", 'province_id' => 10),
            array('city' => "Kabupaten Klaten", 'province_id' => 10),
            array('city' => "Kabupaten Kudus", 'province_id' => 10),
            array('city' => "Kabupaten Magelang", 'province_id' => 10),
            array('city' => "Kabupaten Pati", 'province_id' => 10),
            array('city' => "Kabupaten Pekalongan", 'province_id' => 10),
            array('city' => "Kabupaten Pemalang", 'province_id' => 10),
            array('city' => "Kabupaten Purbalingga", 'province_id' => 10),
            array('city' => "Kabupaten Purworejo", 'province_id' => 10),
            array('city' => "Kabupaten Rembang", 'province_id' => 10),
            array('city' => "Kabupaten Semarang", 'province_id' => 10),
            array('city' => "Kabupaten Sragen", 'province_id' => 10),
            array('city' => "Kabupaten Sukoharjo", 'province_id' => 10),
            array('city' => "Kabupaten Tegal", 'province_id' => 10),
            array('city' => "Kabupaten Temanggung", 'province_id' => 10),
            array('city' => "Kabupaten Wonogiri", 'province_id' => 10),
            array('city' => "Kabupaten Wonosobo", 'province_id' => 10),
            array('city' => "Kota Magelang", 'province_id' => 10),
            array('city' => "Kota Pekalongan", 'province_id' => 10),
            array('city' => "Kota Salatiga", 'province_id' => 10),
            array('city' => "Kota Semarang", 'province_id' => 10),
            array('city' => "Kota Surakarta", 'province_id' => 10),
            array('city' => "Kota Tegal", 'province_id' => 10),
            // end::City for Jawa Tengah

            // begin::City for Jawa Timur
            array('city' => "Kabupaten Bangkalan", 'province_id' => 11),
            array('city' => "Kabupaten Banyuwangi", 'province_id' => 11),
            array('city' => "Kabupaten Blitar", 'province_id' => 11),
            array('city' => "Kabupaten Bojonegoro", 'province_id' => 11),
            array('city' => "Kabupaten Bondowoso", 'province_id' => 11),
            array('city' => "Kabupaten Gresik", 'province_id' => 11),
            array('city' => "Kabupaten Jember", 'province_id' => 11),
            array('city' => "Kabupaten Jombang", 'province_id' => 11),
            array('city' => "Kabupaten Kediri", 'province_id' => 11),
            array('city' => "Kabupaten Lamongan", 'province_id' => 11),
            array('city' => "Kabupaten Lumajang", 'province_id' => 11),
            array('city' => "Kabupaten Madiun", 'province_id' => 11),
            array('city' => "Kabupaten Magetan", 'province_id' => 11),
            array('city' => "Kabupaten Malang", 'province_id' => 11),
            array('city' => "Kabupaten Mojokerto", 'province_id' => 11),
            array('city' => "Kabupaten Nganjuk", 'province_id' => 11),
            array('city' => "Kabupaten Ngawi", 'province_id' => 11),
            array('city' => "Kabupaten Pacitan", 'province_id' => 11),
            array('city' => "Kabupaten Pamekasan", 'province_id' => 11),
            array('city' => "Kabupaten Bangil", 'province_id' => 11),
            array('city' => "Kabupaten Ponorogo", 'province_id' => 11),
            array('city' => "Kabupaten Probolinggo", 'province_id' => 11),
            array('city' => "Kabupaten Sampang", 'province_id' => 11),
            array('city' => "Kabupaten Sidoarjo", 'province_id' => 11),
            array('city' => "Kabupaten Situbondo", 'province_id' => 11),
            array('city' => "Kabupaten Sumenep", 'province_id' => 11),
            array('city' => "Kabupaten Trenggalek", 'province_id' => 11),
            array('city' => "Kabupaten Tuban", 'province_id' => 11),
            array('city' => "Kabupaten Tulungagung", 'province_id' => 11),
            array('city' => "Kota Batu", 'province_id' => 11),
            array('city' => "Kota Blitar", 'province_id' => 11),
            array('city' => "Kota Kediri", 'province_id' => 11),
            array('city' => "Kota Madiun", 'province_id' => 11),
            array('city' => "Kota Malang", 'province_id' => 11),
            array('city' => "Kota Mojokerto", 'province_id' => 11),
            array('city' => "Kota Pasuruan", 'province_id' => 11),
            array('city' => "Kota Probolinggo", 'province_id' => 11),
            array('city' => "Kota Surabaya", 'province_id' => 11),
            // end::City for Jawa Timur

            // begin::City for Kalimantan Barat
            array('city' => "Kabupaten Bengkayang", 'province_id' => 12),
            array('city' => "Kabupaten Kapuas Hulu", 'province_id' => 12),
            array('city' => "Kabupaten Kayong Utara", 'province_id' => 12),
            array('city' => "Kabupaten Ketapang", 'province_id' => 12),
            array('city' => "Kabupaten Kubu Raya", 'province_id' => 12),
            array('city' => "Kabupaten Landak", 'province_id' => 12),
            array('city' => "Kabupaten Melawi", 'province_id' => 12),
            array('city' => "Kabupaten Mempawah", 'province_id' => 12),
            array('city' => "Kabupaten Sambas", 'province_id' => 12),
            array('city' => "Kabupaten Sanggau", 'province_id' => 12),
            array('city' => "Kabupaten Sekadau", 'province_id' => 12),
            array('city' => "Kabupaten Sintang", 'province_id' => 12),
            array('city' => "Kota Pontianak", 'province_id' => 12),
            array('city' => "Kota Singkawang", 'province_id' => 12),
            // end::City for Kalimantan Barat

            // begin::City for Kalimantan Selatan
            array('city' => "Kabupaten Balangan", 'province_id' => 13),
            array('city' => "Kabupaten Banjar", 'province_id' => 13),
            array('city' => "Kabupaten Barito Kuala", 'province_id' => 13),
            array('city' => "Kabupaten Hulu Sungai Selatan", 'province_id' => 13),
            array('city' => "Kabupaten Hulu Sungai Tengah", 'province_id' => 13),
            array('city' => "Kabupaten Hulu Sungai Utara", 'province_id' => 13),
            array('city' => "Kabupaten Kotabaru", 'province_id' => 13),
            array('city' => "Kabupaten Tabalong", 'province_id' => 13),
            array('city' => "Kabupaten Tanah Bumbu", 'province_id' => 13),
            array('city' => "Kabupaten Tanah Laut", 'province_id' => 13),
            array('city' => "Kabupaten Tapin", 'province_id' => 13),
            array('city' => "Kota Banjarbaru", 'province_id' => 13),
            array('city' => "Kota Banjarmasin", 'province_id' => 13),
            // end::City for Kalimantan Selatan

            // begin::City for Kalimantan Tengah
            array('city' => "Kabupaten Barito Selatan", 'province_id' => 14),
            array('city' => "Kabupaten Barito Timur", 'province_id' => 14),
            array('city' => "Kabupaten Barito Utara", 'province_id' => 14),
            array('city' => "Kabupaten Gunung Mas", 'province_id' => 14),
            array('city' => "Kabupaten Kapuas", 'province_id' => 14),
            array('city' => "Kabupaten Katingan", 'province_id' => 14),
            array('city' => "Kabupaten Kotawaringin Barat", 'province_id' => 14),
            array('city' => "Kabupaten Kotawaringin Timur", 'province_id' => 14),
            array('city' => "Kabupaten Lamandau", 'province_id' => 14),
            array('city' => "Kabupaten Murung Raya", 'province_id' => 14),
            array('city' => "Kabupaten Pulang Pisau", 'province_id' => 14),
            array('city' => "Kabupaten Seruyan", 'province_id' => 14),
            array('city' => "Kabupaten Sukamara", 'province_id' => 14),
            array('city' => "Kota Palangka Raya", 'province_id' => 14),
            // end::City for Kalimantan Tengah

            // begin::City for Kalimantan Timur
            array('city' => "Kabupaten Berau", 'province_id' => 15),
            array('city' => "Kabupaten Kutai Barat", 'province_id' => 15),
            array('city' => "Kabupaten Kutai Kartanegara", 'province_id' => 15),
            array('city' => "Kabupaten Kutai Timur", 'province_id' => 15),
            array('city' => "Kabupaten Mahakam Ulu", 'province_id' => 15),
            array('city' => "Kabupaten Paser", 'province_id' => 15),
            array('city' => "Kabupaten Penajam Paser Utara", 'province_id' => 15),
            array('city' => "Kota Balikpapan", 'province_id' => 15),
            array('city' => "Kota Bontang", 'province_id' => 15),
            array('city' => "Kota Samarinda", 'province_id' => 15),
            // end::City for Kalimantan Timur

            // begin::City for Kalimantan Utara
            array('city' => "Kabupaten Bulungan", 'province_id' => 16),
            array('city' => "Kabupaten Malinau", 'province_id' => 16),
            array('city' => "Kabupaten Nunukan", 'province_id' => 16),
            array('city' => "Kabupaten Tana Tidung", 'province_id' => 16),
            array('city' => "Kota Tarakan", 'province_id' => 16),
            // end::City for Kalimantan Utara

            // begin::City for Kepulauan Riau
            array('city' => "Kabupaten Bintan", 'province_id' => 17),
            array('city' => "Kabupaten Karimun", 'province_id' => 17),
            array('city' => "Kabupaten Kepulauan Anambas", 'province_id' => 17),
            array('city' => "Kabupaten Lingga", 'province_id' => 17),
            array('city' => "Kabupaten Natuna", 'province_id' => 17),
            array('city' => "Kota Batam", 'province_id' => 17),
            array('city' => "Kota Tanjungpinang", 'province_id' => 17),
            // end::City for Kepulauan Riau

            // begin::City for Lampung
            array('city' => "Kabupaten Lampung Barat", 'province_id' => 18),
            array('city' => "Kabupaten Lampung Selatan", 'province_id' => 18),
            array('city' => "Kabupaten Lampung Tengah", 'province_id' => 18),
            array('city' => "Kabupaten Lampung Timur", 'province_id' => 18),
            array('city' => "Kabupaten Lampung Utara", 'province_id' => 18),
            array('city' => "Kabupaten Mesuji", 'province_id' => 18),
            array('city' => "Kabupaten Pesawaran", 'province_id' => 18),
            array('city' => "Kabupaten Pesisir Barat", 'province_id' => 18),
            array('city' => "Kabupaten Pringsewu", 'province_id' => 18),
            array('city' => "Kabupaten Tanggamus", 'province_id' => 18),
            array('city' => "Kabupaten Tulang Bawang", 'province_id' => 18),
            array('city' => "Kabupaten Tulang Bawang Barat", 'province_id' => 18),
            array('city' => "Kabupaten Way Kanan", 'province_id' => 18),
            array('city' => "Kota Bandar Lampung", 'province_id' => 18),
            array('city' => "Kota Metro", 'province_id' => 18),
            // end::City for Lampung

            // begin::City for Maluku
            array('city' => "Kabupaten Buru", 'province_id' => 19),
            array('city' => "Kabupaten Buru Selatan", 'province_id' => 19),
            array('city' => "Kabupaten Kepulauan Aru", 'province_id' => 19),
            array('city' => "Kabupaten Kepulauan Tanimbar", 'province_id' => 19),
            array('city' => "Kabupaten Maluku Barat Daya", 'province_id' => 19),
            array('city' => "Kabupaten Maluku Tengah", 'province_id' => 19),
            array('city' => "Kabupaten Maluku Tenggara", 'province_id' => 19),
            array('city' => "Kabupaten Seram Bagian Barat", 'province_id' => 19),
            array('city' => "Kabupaten Seram Bagian Timur", 'province_id' => 19),
            array('city' => "Kota Ambon", 'province_id' => 19),
            array('city' => "Kota Tual", 'province_id' => 19),
            // end::City for Maluku

            // begin::City for Maluku Utara
            array('city' => "Kabupaten Halmahera Barat", 'province_id' => 20),
            array('city' => "Kabupaten Halmahera Selatan", 'province_id' => 20),
            array('city' => "Kabupaten Halmahera Tengah", 'province_id' => 20),
            array('city' => "Kabupaten Halmahera Timur", 'province_id' => 20),
            array('city' => "Kabupaten Halmahera Utara", 'province_id' => 20),
            array('city' => "Kepulauan Sula", 'province_id' => 20),
            array('city' => "Kabupaten Pulau Morotai", 'province_id' => 20),
            array('city' => "Kabupaten Pulau Taliabu", 'province_id' => 20),
            array('city' => "Kota Ternate", 'province_id' => 20),
            array('city' => "Kota Tidore Kepulauan", 'province_id' => 20),
            // end::City for Maluku Utara

            // begin::City for Nanggroe Aceh Darussalam
            array('city' => "Kabupaten Aceh Barat", 'province_id' => 21),
            array('city' => "Kabupaten Aceh Barat Daya", 'province_id' => 21),
            array('city' => "Kabupaten Aceh Besar", 'province_id' => 21),
            array('city' => "Kabupaten Aceh Jaya", 'province_id' => 21),
            array('city' => "Kabupaten Aceh Selatan", 'province_id' => 21),
            array('city' => "Kabupaten Aceh Singkil", 'province_id' => 21),
            array('city' => "Kabupaten Aceh Tamiang", 'province_id' => 21),
            array('city' => "Kabupaten Aceh Tengah", 'province_id' => 21),
            array('city' => "Kabupaten Aceh Tenggara", 'province_id' => 21),
            array('city' => "Kabupaten Aceh Timur", 'province_id' => 21),
            array('city' => "Kabupaten Aceh Utara", 'province_id' => 21),
            array('city' => "Kabupaten Bener Meriah", 'province_id' => 21),
            array('city' => "Kabupaten Bireuen", 'province_id' => 21),
            array('city' => "Kabupaten Gayo Lues", 'province_id' => 21),
            array('city' => "Kabupaten Nagan Raya", 'province_id' => 21),
            array('city' => "Kabupaten Pidie", 'province_id' => 21),
            array('city' => "Kabupaten Pidie Jaya", 'province_id' => 21),
            array('city' => "Kabupaten Simeulue", 'province_id' => 21),
            array('city' => "Kota Banda Aceh", 'province_id' => 21),
            array('city' => "Kota Langsa", 'province_id' => 21),
            array('city' => "Kota Lhokseumawe", 'province_id' => 21),
            array('city' => "Kota Sabang", 'province_id' => 21),
            array('city' => "Kota Subulussalam", 'province_id' => 21),
            // end::City for Nanggroe Aceh Darussalam

            // begin::City for Nusa Tenggara Barat
            array('city' => "Kabupaten Bima", 'province_id' => 22),
            array('city' => "Kabupaten Dompu", 'province_id' => 22),
            array('city' => "Kabupaten Lombok Barat", 'province_id' => 22),
            array('city' => "Kabupaten Lombok Tengah", 'province_id' => 22),
            array('city' => "Kabupaten Lombok Timur", 'province_id' => 22),
            array('city' => "Kabupaten Lombok Utara", 'province_id' => 22),
            array('city' => "Kabupaten Sumbawa", 'province_id' => 22),
            array('city' => "Kota Bima", 'province_id' => 22),
            array('city' => "Kota Mataram", 'province_id' => 22),
            // end::City for Nusa Tenggara Barat

            // begin::City for Nusa Tenggara Timur
            array('city' => "Kabupaten Alor", 'province_id' => 23),
            array('city' => "Kabupaten Belu", 'province_id' => 23),
            array('city' => "Kabupaten Ende", 'province_id' => 23),
            array('city' => "Kabupaten Flores Timur", 'province_id' => 23),
            array('city' => "Kabupaten Kupang", 'province_id' => 23),
            array('city' => "Kabupaten Lembata", 'province_id' => 23),
            array('city' => "Kabupaten Malaka", 'province_id' => 23),
            array('city' => "Kabupaten Manggarai", 'province_id' => 23),
            array('city' => "Kabupaten Manggarai Barat", 'province_id' => 23),
            array('city' => "Kabupaten Manggarai Timur", 'province_id' => 23),
            array('city' => "Kabupaten Nagekeo", 'province_id' => 23),
            array('city' => "Kabupaten Ngada", 'province_id' => 23),
            array('city' => "Kabupaten Rote Ndao", 'province_id' => 23),
            array('city' => "Kabupaten Sabu Raijua", 'province_id' => 23),
            array('city' => "Kabupaten Sikka", 'province_id' => 23),
            array('city' => "Kabupaten Sumba Barat", 'province_id' => 23),
            array('city' => "Kabupaten Sumba Barat Daya", 'province_id' => 23),
            array('city' => "Kabupaten Sumba Tengah", 'province_id' => 23),
            array('city' => "Kabupaten Sumba Timur", 'province_id' => 23),
            array('city' => "Kabupaten Timor Tengah Selatan", 'province_id' => 23),
            array('city' => "Kabupaten Timor Tengah Utara", 'province_id' => 23),
            array('city' => "Kota Kupang", 'province_id' => 23),
            // end::City for Nusa Tenggara Timur

            // begin::City for Papua
            array('city' => "Kabupaten Biak Numfor", 'province_id' => 24),
            array('city' => "Kabupaten Jayapura", 'province_id' => 24),
            array('city' => "Kabupaten Keerom", 'province_id' => 24),
            array('city' => "Kabupaten Kepulauan Yapen", 'province_id' => 24),
            array('city' => "Kabupaten Mamberamo Raya", 'province_id' => 24),
            array('city' => "Kabupaten Sarmi", 'province_id' => 24),
            array('city' => "Kabupaten Supiori", 'province_id' => 24),
            array('city' => "Kabupaten Waropen", 'province_id' => 24),
            array('city' => "Kota Jayapura", 'province_id' => 24),
            // end::City for Papua

            // begin::City for Papua Barat
            array('city' => "Kabupaten Fakfak", 'province_id' => 25),
            array('city' => "Kabupaten Kaimana", 'province_id' => 25),
            array('city' => "Kabupaten Manokwari", 'province_id' => 25),
            array('city' => "Kabupaten Manokwari Selatan", 'province_id' => 25),
            array('city' => "Kabupaten Pegunungan Arfak", 'province_id' => 25),
            array('city' => "Kabupaten Teluk Bintuni", 'province_id' => 25),
            array('city' => "Kabupaten Teluk Wondama", 'province_id' => 25),
            // end::City for Papua Barat

            // begin::City for Riau
            array('city' => "Kabupaten Bengkalis", 'province_id' => 26),
            array('city' => "Kabupaten Indragiri Hilir", 'province_id' => 26),
            array('city' => "Kabupaten Indragiri Hulu", 'province_id' => 26),
            array('city' => "Kabupaten Kampar", 'province_id' => 26),
            array('city' => "Kabupaten Kepulauan Meranti", 'province_id' => 26),
            array('city' => "Kabupaten Kuantan Singingi", 'province_id' => 26),
            array('city' => "Kabupaten Pelalawan", 'province_id' => 26),
            array('city' => "Kabupaten Rokan Hilir", 'province_id' => 26),
            array('city' => "Kabupaten Rokan Hulu", 'province_id' => 26),
            array('city' => "Kabupaten Siak", 'province_id' => 26),
            array('city' => "Kota Dumai", 'province_id' => 26),
            array('city' => "Kota Pekanbaru", 'province_id' => 26),
            // end::City for Riau

            // begin::City for Sulawesi Barat
            array('city' => "Kabupaten Majene", 'province_id' => 27),
            array('city' => "Kabupaten Mamasa", 'province_id' => 27),
            array('city' => "Kabupaten Mamuju", 'province_id' => 27),
            array('city' => "Kabupaten Mamuju Tengah", 'province_id' => 27),
            array('city' => "Kabupaten Pasangkayu", 'province_id' => 27),
            array('city' => "Kabupaten Polewali Mandar", 'province_id' => 27),
            // end::City for Sulawesi Barat

            // begin::City for Sulawesi Selatan
            array('city' => "Kabupaten Bantaeng", 'province_id' => 28),
            array('city' => "Kabupaten Barru", 'province_id' => 28),
            array('city' => "Kabupaten Bone", 'province_id' => 28),
            array('city' => "Kabupaten Bulukumba", 'province_id' => 28),
            array('city' => "Kabupaten Enrekang", 'province_id' => 28),
            array('city' => "Kabupaten Gowa", 'province_id' => 28),
            array('city' => "Kabupaten Jeneponto", 'province_id' => 28),
            array('city' => "Kabupaten Kepulauan Selayar", 'province_id' => 28),
            array('city' => "Kabupaten Luwu", 'province_id' => 28),
            array('city' => "Kabupaten Luwu Timur", 'province_id' => 28),
            array('city' => "Kabupaten Luwu Utara", 'province_id' => 28),
            array('city' => "Kabupaten Maros", 'province_id' => 28),
            array('city' => "Kabupaten Pinrang", 'province_id' => 28),
            array('city' => "Kabupaten Sidenreng Rappang", 'province_id' => 28),
            array('city' => "Kabupaten Sinjai", 'province_id' => 28),
            array('city' => "Kabupaten Soppeng", 'province_id' => 28),
            array('city' => "Kabupaten Takalar", 'province_id' => 28),
            array('city' => "Kabupaten Tana Toraja", 'province_id' => 28),
            array('city' => "Kabupaten Wajo", 'province_id' => 28),
            array('city' => "Kota Makassar", 'province_id' => 28),
            array('city' => "Kota Palopo", 'province_id' => 28),
            array('city' => "Kota Parepare", 'province_id' => 28),
            // end::City for Sulawesi Selatan

            // begin::City for Sulawesi Tengah
            array('city' => "Kabupaten Banggai", 'province_id' => 29),
            array('city' => "Kabupaten Banggai Kepulauan", 'province_id' => 29),
            array('city' => "Kabupaten Banggai Laut", 'province_id' => 29),
            array('city' => "Kabupaten Buol", 'province_id' => 29),
            array('city' => "Kabupaten Donggala", 'province_id' => 29),
            array('city' => "Kabupaten Morowali", 'province_id' => 29),
            array('city' => "Kabupaten Morowali Utara", 'province_id' => 29),
            array('city' => "Kabupaten Parigi Moutong", 'province_id' => 29),
            array('city' => "Kabupaten Poso", 'province_id' => 29),
            array('city' => "Kabupaten Sigi", 'province_id' => 29),
            array('city' => "Kabupaten Tojo Una-Una", 'province_id' => 29),
            array('city' => "Kabupaten Tolitoli", 'province_id' => 29),
            array('city' => "Kota Palu", 'province_id' => 29),
            // end::City for Sulawesi Tengah

            // begin::City for Sulawesi Tenggara
            array('city' => "Kabupaten Bombana", 'province_id' => 30),
            array('city' => "Kabupaten Buton", 'province_id' => 30),
            array('city' => "Kabupaten Buton Selatan", 'province_id' => 30),
            array('city' => "Kabupaten Buton Tengah", 'province_id' => 30),
            array('city' => "Kabupaten Buton Utara", 'province_id' => 30),
            array('city' => "Kabupaten Kolaka", 'province_id' => 30),
            array('city' => "Kabupaten Kolaka Timur", 'province_id' => 30),
            array('city' => "Kabupaten Kolaka Utara", 'province_id' => 30),
            array('city' => "Kabupaten Konawe", 'province_id' => 30),
            array('city' => "Kabupaten Konawe Kepulauan", 'province_id' => 30),
            array('city' => "Kabupaten Konawe Selatan", 'province_id' => 30),
            array('city' => "Kabupaten Konawe Utara", 'province_id' => 30),
            array('city' => "Kabupaten Muna", 'province_id' => 30),
            array('city' => "Kabupaten Muna Barat", 'province_id' => 30),
            array('city' => "Kabupaten Wakatobi", 'province_id' => 30),
            array('city' => "Kota Baubau", 'province_id' => 30),
            array('city' => "Kota Kendari", 'province_id' => 30),
            // end::City for Sulawesi Tenggara

            // begin::City for Sulawesi Utara
            array('city' => "Kabupaten Bolaang Mongondow", 'province_id' => 31),
            array('city' => "Kabupaten Bolaang Mongondow Selatan", 'province_id' => 31),
            array('city' => "Kabupaten Bolaang Mongondow Timur", 'province_id' => 31),
            array('city' => "Kabupaten Bolaang Mongondow Utara", 'province_id' => 31),
            array('city' => "Kabupaten Kepulauan Sangihe", 'province_id' => 31),
            array('city' => "Kabupaten Kepulauan Siau Tagulandang Biaro", 'province_id' => 31),
            array('city' => "Kabupaten Kepulauan Talaud", 'province_id' => 31),
            array('city' => "Kabupaten Minahasa", 'province_id' => 31),
            array('city' => "Kabupaten Minahasa Selatan", 'province_id' => 31),
            array('city' => "Kabupaten Minahasa Tenggara", 'province_id' => 31),
            array('city' => "Kabupaten Minahasa Utara", 'province_id' => 31),
            array('city' => "Kota Bitung", 'province_id' => 31),
            array('city' => "Kota Kotamobagu", 'province_id' => 31),
            array('city' => "Kota Manado", 'province_id' => 31),
            array('city' => "Kota Tomohon", 'province_id' => 31),
            // end::City for Sulawesi Utara

            // begin::City for Sumatera Barat
            array('city' => "Kabupaten Agam", 'province_id' => 32),
            array('city' => "Kabupaten Dharmasraya", 'province_id' => 32),
            array('city' => "Kabupaten Kepulauan Mentawai", 'province_id' => 32),
            array('city' => "Kabupaten Lima Puluh Kota", 'province_id' => 32),
            array('city' => "Kabupaten Padang Pariaman", 'province_id' => 32),
            array('city' => "Kabupaten Pasaman", 'province_id' => 32),
            array('city' => "Kabupaten Pasaman Barat", 'province_id' => 32),
            array('city' => "Kabupaten Pesisir Selatan", 'province_id' => 32),
            array('city' => "Kabupaten Sijunjung", 'province_id' => 32),
            array('city' => "Kabupaten Solok", 'province_id' => 32),
            array('city' => "Kabupaten Solok Selatan", 'province_id' => 32),
            array('city' => "Kabupaten Tanah Datar", 'province_id' => 32),
            array('city' => "Kota Bukittinggi", 'province_id' => 32),
            array('city' => "Kota Padang", 'province_id' => 32),
            array('city' => "Kota Padang Panjang", 'province_id' => 32),
            array('city' => "Kota Pariaman", 'province_id' => 32),
            array('city' => "Kota Payakumbuh", 'province_id' => 32),
            array('city' => "Kota Sawahlunto", 'province_id' => 32),
            array('city' => "Kota Solok", 'province_id' => 32),
            // end::City for Sumatera Barat

            // begin::City for Sumatera Selatan
            array('city' => "Kabupaten Banyuasin", 'province_id' => 33),
            array('city' => "Kabupaten Empat Lawang", 'province_id' => 33),
            array('city' => "Kabupaten Lahat", 'province_id' => 33),
            array('city' => "Kabupaten Muara Enim", 'province_id' => 33),
            array('city' => "Kabupaten Musi Banyuasin", 'province_id' => 33),
            array('city' => "Kabupaten Musi Rawas", 'province_id' => 33),
            array('city' => "Kabupaten Musi Rawas Utara", 'province_id' => 33),
            array('city' => "Kabupaten Ogan Ilir", 'province_id' => 33),
            array('city' => "Kabupaten Ogan Komering Ilir", 'province_id' => 33),
            array('city' => "Kabupaten Ogan Komering Ulu", 'province_id' => 33),
            array('city' => "Kabupaten Ogan Komering Ulu Selatan", 'province_id' => 33),
            array('city' => "Kabupaten Ogan Komering Ulu Timur", 'province_id' => 33),
            array('city' => "Kabupaten Penukal Abab Lematang Ilir", 'province_id' => 33),
            array('city' => "Kota Lubuklinggau", 'province_id' => 33),
            array('city' => "Kota Pagar Alam", 'province_id' => 33),
            array('city' => "Kota Palembang", 'province_id' => 33),
            array('city' => "Kota Prabumulih", 'province_id' => 33),
            // end::City for Sumatera Selatan

            // begin::City for Sumatera Utara
            array('city' => "Kabupaten Asahan", 'province_id' => 34),
            array('city' => "Kabupaten Batu Bara", 'province_id' => 34),
            array('city' => "Kabupaten Dairi", 'province_id' => 34),
            array('city' => "Kabupaten Deli Serdang", 'province_id' => 34),
            array('city' => "Kabupaten Humbang Hasundutan", 'province_id' => 34),
            array('city' => "Kabupaten Karo", 'province_id' => 34),
            array('city' => "Kabupaten Labuhanbatu", 'province_id' => 34),
            array('city' => "Kabupaten Labuhanbatu Selatan", 'province_id' => 34),
            array('city' => "Kabupaten Labuhanbatu Utara", 'province_id' => 34),
            array('city' => "Kabupaten Langkat", 'province_id' => 34),
            array('city' => "Kabupaten Mandailing Natal", 'province_id' => 34),
            array('city' => "Kabupaten Nias", 'province_id' => 34),
            array('city' => "Kabupaten Nias Barat", 'province_id' => 34),
            array('city' => "Kabupaten Nias Selatan", 'province_id' => 34),
            array('city' => "Kabupaten Nias Utara", 'province_id' => 34),
            array('city' => "Kabupaten Padang Lawas", 'province_id' => 34),
            array('city' => "Kabupaten Padang Lawas Utara", 'province_id' => 34),
            array('city' => "Kabupaten Pakpak Bharat", 'province_id' => 34),
            array('city' => "Kabupaten Samosir", 'province_id' => 34),
            array('city' => "Kabupaten Serdang Bedagai", 'province_id' => 34),
            array('city' => "Kabupaten Simalungun", 'province_id' => 34),
            array('city' => "Kabupaten Tapanuli Selatan", 'province_id' => 34),
            array('city' => "Kabupaten Tapanuli Tengah", 'province_id' => 34),
            array('city' => "Kabupaten Tapanuli Utara", 'province_id' => 34),
            array('city' => "Kabupaten Toba", 'province_id' => 34),
            array('city' => "Kota Binjai", 'province_id' => 34),
            array('city' => "Kota Gunungsitoli", 'province_id' => 34),
            array('city' => "Kota Medan", 'province_id' => 34),
            array('city' => "Kota Padangsidimpuan", 'province_id' => 34),
            array('city' => "Kota Pematangsiantar", 'province_id' => 34),
            array('city' => "Kota Sibolga", 'province_id' => 34),
            array('city' => "Kota Tanjungbalai", 'province_id' => 34),
            array('city' => "Kota Tebing Tinggi", 'province_id' => 34),
            // end::City for Sumatera Utara
        );
        DB::table('cities')->insert($districts);
    }
}
