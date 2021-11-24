<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
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
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('AdminKP2022'),
                'role' => 'admin',
                'provinsi_id' => 12,
                'kota_kab_id' => 189,
                'event_id' => null,
                'created_at' => today()
            ],
        ]);
    }
}
