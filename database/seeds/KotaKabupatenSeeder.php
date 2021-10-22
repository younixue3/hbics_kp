<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KotaKabupatenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kota_kab')->insert([
            [ 'kota' => 'Kab. Aceh Barat', 'provinsi_id' => 1 ],
            [ 'kota' => 'Kab. Aceh Barat Daya', 'provinsi_id' => 1 ],
            [ 'kota' => 'Kab. Aceh Besar', 'provinsi_id' => 1 ],
            [ 'kota' => 'Kab. Aceh Jaya', 'provinsi_id' => 1 ],
            [ 'kota' => 'Kab. Aceh Selatan', 'provinsi_id' => 1 ],
            [ 'kota' => 'Kab. Aceh Singkil', 'provinsi_id' => 1 ],
            [ 'kota' => 'Kab. Aceh Tamiang', 'provinsi_id' => 1 ],
            [ 'kota' => 'Kab. Aceh Tengah', 'provinsi_id' => 1 ],
            [ 'kota' => 'Kab. Aceh Tenggara', 'provinsi_id' => 1 ],
            [ 'kota' => 'Kab. Aceh Timur', 'provinsi_id' => 1 ],
            [ 'kota' => 'Kab. Aceh Utara', 'provinsi_id' => 1 ],
            [ 'kota' => 'Kab. Bener Meriah', 'provinsi_id' => 1 ],
            [ 'kota' => 'Kab. Bireuen', 'provinsi_id' => 1 ],
            [ 'kota' => 'Kab. Gayo Lues', 'provinsi_id' => 1 ],
            [ 'kota' => 'Kab. Nagan Raya', 'provinsi_id' => 1 ],
            [ 'kota' => 'Kab. Pidie', 'provinsi_id' => 1 ],
            [ 'kota' => 'Kab. Pidie Jaya', 'provinsi_id' => 1 ],
            [ 'kota' => 'Kab. Simeulue', 'provinsi_id' => 1 ],
            [ 'kota' => 'Kota Banda Aceh', 'provinsi_id' => 1 ],
            [ 'kota' => 'Kota Langsa', 'provinsi_id' => 1 ],
            [ 'kota' => 'Kota Lhokseumawe', 'provinsi_id' => 1 ],
            [ 'kota' => 'Kota Sabang', 'provinsi_id' => 1 ],
            [ 'kota' => 'Kota Subulussalam', 'provinsi_id' => 1 ],
            [ 'kota' => 'Kab. Lebak', 'provinsi_id' => 2 ],
            [ 'kota' => 'Kab. Pandeglang', 'provinsi_id' => 2 ],
            [ 'kota' => 'Kab. Serang', 'provinsi_id' => 2 ],
            [ 'kota' => 'Kab. Tangerang', 'provinsi_id' => 2 ],
            [ 'kota' => 'Kota Cilegon', 'provinsi_id' => 2 ],
            [ 'kota' => 'Kota Serang', 'provinsi_id' => 2 ],
            [ 'kota' => 'Kota Tangerang', 'provinsi_id' => 2 ],
            [ 'kota' => 'Kota Tangerang Selatan', 'provinsi_id' => 2 ],
            [ 'kota' => 'Kab. Bengkulu Selatan', 'provinsi_id' => 3 ],
            [ 'kota' => 'Kab. Bengkulu Tengah', 'provinsi_id' => 3 ],
            [ 'kota' => 'Kab. Bengkulu Utara', 'provinsi_id' => 3 ],
            [ 'kota' => 'Kab. Kaur', 'provinsi_id' => 3 ],
            [ 'kota' => 'Kab. Kepahiang', 'provinsi_id' => 3 ],
            [ 'kota' => 'Kab. Lebong', 'provinsi_id' => 3 ],
            [ 'kota' => 'Kab. Mukomuko', 'provinsi_id' => 3 ],
            [ 'kota' => 'Kab. Rejang Lebong', 'provinsi_id' => 3 ],
            [ 'kota' => 'Kab. Seluma', 'provinsi_id' => 3 ],
            [ 'kota' => 'Kota Bengkulu', 'provinsi_id' => 3 ],
            [ 'kota' => 'Kab. Badung', 'provinsi_id' => 4 ],
            [ 'kota' => 'Kab. Bangli', 'provinsi_id' => 4 ],
            [ 'kota' => 'Kab. Buleleng', 'provinsi_id' => 4 ],
            [ 'kota' => 'Kab. Gianyar', 'provinsi_id' => 4 ],
            [ 'kota' => 'Kab. Jembrana', 'provinsi_id' => 4 ],
            [ 'kota' => 'Kab. Karangasem', 'provinsi_id' => 4 ],
            [ 'kota' => 'Kab. Klungkung', 'provinsi_id' => 4 ],
            [ 'kota' => 'Kab. Tabanan', 'provinsi_id' => 4 ],
            [ 'kota' => 'Kota Denpasar', 'provinsi_id' => 4 ],
            [ 'kota' => 'Kab. Bantul', 'provinsi_id' => 5 ],
            [ 'kota' => 'Kab. Gunungkidul', 'provinsi_id' => 5 ],
            [ 'kota' => 'Kab. Kulon Progo', 'provinsi_id' => 5 ],
            [ 'kota' => 'Kab. Sleman', 'provinsi_id' => 5 ],
            [ 'kota' => 'Kota Yogyakarta', 'provinsi_id' => 5 ],
            [ 'kota' => 'Kab. Kepulauan Seribu', 'provinsi_id' => 6 ],
            [ 'kota' => 'Jakarta Barat', 'provinsi_id' => 6 ],
            [ 'kota' => 'Jakarta Pusat', 'provinsi_id' => 6 ],
            [ 'kota' => 'Jakarta Selatan', 'provinsi_id' => 6 ],
            [ 'kota' => 'Jakarta Timur', 'provinsi_id' => 6 ],
            [ 'kota' => 'Jakarta Utara', 'provinsi_id' => 6 ],
            [ 'kota' => 'Kab. Boalemo', 'provinsi_id' => 7 ],
            [ 'kota' => 'Kab. Bone Bolango', 'provinsi_id' => 7 ],
            [ 'kota' => 'Kab. Gorontalo', 'provinsi_id' => 7 ],
            [ 'kota' => 'Kab. Gorontalo Utara', 'provinsi_id' => 7 ],
            [ 'kota' => 'Kab. Pohuwato', 'provinsi_id' => 7 ],
            [ 'kota' => 'Kota Gorontalo', 'provinsi_id' => 7 ],
        ]);
    }
}
