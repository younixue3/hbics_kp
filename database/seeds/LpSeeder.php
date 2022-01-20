<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategori_lp')->insert([
            ['kategori' => 'Drawing & Coloring Virtual Competition', 'harga' => 50000, 'jenjang' => 'sd'],
            ['kategori' => 'Food Presentation Competition', 'harga' => 30000, 'jenjang' => 'sd'],
            ['kategori' => 'Kids Warrior', 'harga' => 70000, 'jenjang' => 'sd'],
            ['kategori' => 'STEAM Challenge', 'harga' => 30000, 'jenjang' => 'sd'],
            ['kategori' => 'Story Telling Virtual', 'harga' => 30000, 'jenjang' => 'sd']
        ]);
    }
}
