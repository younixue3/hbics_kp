<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriLombaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategori_lomba')->insert([
            ['kategori' => 'Desain Grafis', "photo" => 'images/kategori/h-desain.png'],
            ['kategori' => 'Aplikasi & Game', "photo" => 'images/kategori/h-aplikasi.png'],
            ['kategori' => 'Food & Beverage', "photo" => 'images/kategori/h-fnb.png'],
            ['kategori' => 'Fashion', "photo" => 'images/kategori/h-fashion.png'],
            ['kategori' => 'Kriya', "photo" => 'images/kategori/h-kriya.png'],
        ]);
    }
}
