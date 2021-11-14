<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CostumerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'ricko',
                'email' => 'ricko@gmail.com',
                'password' => Hash::make('ricko'),
                'role' => 'pengunjung',
                'provinsi_id' => 12,
                'kota_kab_id' => 189,
                'event_id' => 1,
                'kategori_peserta' => 'individu',
                'pembayaran' => 'verified'
            ],
            [
                'name' => 'ryan',
                'email' => 'ryan@gmail.com',
                'password' => Hash::make('ricko'),
                'role' => 'peserta',
                'provinsi_id' => 12,
                'kota_kab_id' => 189,
                'event_id' => 1,
                'kategori_peserta' => 'kelompok',
                'pembayaran' => 'unverified'
            ]
        ]);
    }
}
