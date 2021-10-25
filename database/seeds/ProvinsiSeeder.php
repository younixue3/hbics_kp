<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('provinsi')->insert([
            ['provinsi' => 'Aceh'],
            ['provinsi' => 'Banten'],
            ['provinsi' => 'Bengkulu'],
            ['provinsi' => 'Bali'],
            ['provinsi' => 'D.I Yogyakarta'],
            ['provinsi' => 'DKI Jakarta'],
            ['provinsi' => 'Gorontalo'],
            ['provinsi' => 'Jambi'],
            ['provinsi' => 'Jawa Timur'],
            ['provinsi' => 'Jawa Tengah'],
            ['provinsi' => 'Jawa Barat'],
            ['provinsi' => 'Kalimantan Timur'],
            ['provinsi' => 'Kalimantan Barat'],
            ['provinsi' => 'Kalimantan Selatan'],
            ['provinsi' => 'Kalimantan Utara'],
            ['provinsi' => 'Lampung'],
            ['provinsi' => 'Maluku'],
            ['provinsi' => 'Maluku Utara'],
            ['provinsi' => 'Nusa Tenggara Barat'],
            ['provinsi' => 'Nusa Tenggara Timur'],
            ['provinsi' => 'Papua'],
            ['provinsi' => 'Papua Barat'],
            ['provinsi' => 'Riau'],
            ['provinsi' => 'Sumatera Barat'],
            ['provinsi' => 'Sumatera Selatan'],
            ['provinsi' => 'Sumatera Utara'],
            ['provinsi' => 'Sulawesi Barat'],
            ['provinsi' => 'Sulawesi Selatan'],
            ['provinsi' => 'Sulawesi Tengah'],
            ['provinsi' => 'Sulawesi Tenggara']
        ]);
    }
}
