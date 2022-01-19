<?php

use Illuminate\Database\Seeder;

class KategoriLpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategori_lp')->insert([
            ['kategori' => 'Drawing & Coloring Virtual', 'harga' => 80000],
            ['kategori' => 'Food Plating', 'harga' => 50000],
            ['kategori' => 'Kids Warrior', 'harga' => 100000],
            ['kategori' => 'STEAM Challenge', 'harga' => 100000],
            ['kategori' => 'Story Telling Virtual', 'harga' => 30000]
        ]);
    }
}
