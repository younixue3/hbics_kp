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
            ['kota' => 'Kab. Aceh Barat', 'provinsi_id' => 1],
            ['kota' => 'Kab. Aceh Barat Daya', 'provinsi_id' => 1],
            ['kota' => 'Kab. Aceh Besar', 'provinsi_id' => 1],
            ['kota' => 'Kab. Aceh Jaya', 'provinsi_id' => 1],
            ['kota' => 'Kab. Aceh Selatan', 'provinsi_id' => 1],
            ['kota' => 'Kab. Aceh Singkil', 'provinsi_id' => 1],
            ['kota' => 'Kab. Aceh Tamiang', 'provinsi_id' => 1],
            ['kota' => 'Kab. Aceh Tengah', 'provinsi_id' => 1],
            ['kota' => 'Kab. Aceh Tenggara', 'provinsi_id' => 1],
            ['kota' => 'Kab. Aceh Timur', 'provinsi_id' => 1],
            ['kota' => 'Kab. Aceh Utara', 'provinsi_id' => 1],
            ['kota' => 'Kab. Bener Meriah', 'provinsi_id' => 1],
            ['kota' => 'Kab. Bireuen', 'provinsi_id' => 1],
            ['kota' => 'Kab. Gayo Lues', 'provinsi_id' => 1],
            ['kota' => 'Kab. Nagan Raya', 'provinsi_id' => 1],
            ['kota' => 'Kab. Pidie', 'provinsi_id' => 1],
            ['kota' => 'Kab. Pidie Jaya', 'provinsi_id' => 1],
            ['kota' => 'Kab. Simeulue', 'provinsi_id' => 1],
            ['kota' => 'Kota Banda Aceh', 'provinsi_id' => 1],
            ['kota' => 'Kota Langsa', 'provinsi_id' => 1],
            ['kota' => 'Kota Lhokseumawe', 'provinsi_id' => 1],
            ['kota' => 'Kota Sabang', 'provinsi_id' => 1],
            ['kota' => 'Kota Subulussalam', 'provinsi_id' => 1],
            ['kota' => 'Kab. Lebak', 'provinsi_id' => 2],
            ['kota' => 'Kab. Pandeglang', 'provinsi_id' => 2],
            ['kota' => 'Kab. Serang', 'provinsi_id' => 2],
            ['kota' => 'Kab. Tangerang', 'provinsi_id' => 2],
            ['kota' => 'Kota Cilegon', 'provinsi_id' => 2],
            ['kota' => 'Kota Serang', 'provinsi_id' => 2],
            ['kota' => 'Kota Tangerang', 'provinsi_id' => 2],
            ['kota' => 'Kota Tangerang Selatan', 'provinsi_id' => 2],
            ['kota' => 'Kab. Bengkulu Selatan', 'provinsi_id' => 3],
            ['kota' => 'Kab. Bengkulu Tengah', 'provinsi_id' => 3],
            ['kota' => 'Kab. Bengkulu Utara', 'provinsi_id' => 3],
            ['kota' => 'Kab. Kaur', 'provinsi_id' => 3],
            ['kota' => 'Kab. Kepahiang', 'provinsi_id' => 3],
            ['kota' => 'Kab. Lebong', 'provinsi_id' => 3],
            ['kota' => 'Kab. Mukomuko', 'provinsi_id' => 3],
            ['kota' => 'Kab. Rejang Lebong', 'provinsi_id' => 3],
            ['kota' => 'Kab. Seluma', 'provinsi_id' => 3],
            ['kota' => 'Kota Bengkulu', 'provinsi_id' => 3],
            ['kota' => 'Kab. Badung', 'provinsi_id' => 4],
            ['kota' => 'Kab. Bangli', 'provinsi_id' => 4],
            ['kota' => 'Kab. Buleleng', 'provinsi_id' => 4],
            ['kota' => 'Kab. Gianyar', 'provinsi_id' => 4],
            ['kota' => 'Kab. Jembrana', 'provinsi_id' => 4],
            ['kota' => 'Kab. Karangasem', 'provinsi_id' => 4],
            ['kota' => 'Kab. Klungkung', 'provinsi_id' => 4],
            ['kota' => 'Kab. Tabanan', 'provinsi_id' => 4],
            ['kota' => 'Kota Denpasar', 'provinsi_id' => 4],
            ['kota' => 'Kab. Bantul', 'provinsi_id' => 5],
            ['kota' => 'Kab. Gunungkidul', 'provinsi_id' => 5],
            ['kota' => 'Kab. Kulon Progo', 'provinsi_id' => 5],
            ['kota' => 'Kab. Sleman', 'provinsi_id' => 5],
            ['kota' => 'Kota Yogyakarta', 'provinsi_id' => 5],
            ['kota' => 'Kab. Kepulauan Seribu', 'provinsi_id' => 6],
            ['kota' => 'Jakarta Barat', 'provinsi_id' => 6],
            ['kota' => 'Jakarta Pusat', 'provinsi_id' => 6],
            ['kota' => 'Jakarta Selatan', 'provinsi_id' => 6],
            ['kota' => 'Jakarta Timur', 'provinsi_id' => 6],
            ['kota' => 'Jakarta Utara', 'provinsi_id' => 6],
            ['kota' => 'Kab. Boalemo', 'provinsi_id' => 7],
            ['kota' => 'Kab. Bone Bolango', 'provinsi_id' => 7],
            ['kota' => 'Kab. Gorontalo', 'provinsi_id' => 7],
            ['kota' => 'Kab. Gorontalo Utara', 'provinsi_id' => 7],
            ['kota' => 'Kab. Pohuwato', 'provinsi_id' => 7],
            ['kota' => 'Kota Gorontalo', 'provinsi_id' => 7],
            ['kota' => 'Kab. Batanghari', 'provinsi_id' => 8],
            ['kota' => 'Kab. Bungo', 'provinsi_id' => 8],
            ['kota' => 'Kab. Kerinci', 'provinsi_id' => 8],
            ['kota' => 'Kab. Merangin', 'provinsi_id' => 8],
            ['kota' => 'Kab. Muaro Jambi', 'provinsi_id' => 8],
            ['kota' => 'Kab. Sarolangun', 'provinsi_id' => 8],
            ['kota' => 'Kab. Tanjung Jabung Barat', 'provinsi_id' => 8],
            ['kota' => 'Kab. Tanjung Jabung Timur', 'provinsi_id' => 8],
            ['kota' => 'Kab. Tebo', 'provinsi_id' => 8],
            ['kota' => 'Kota Jambi', 'provinsi_id' => 8],
            ['kota' => 'Kota Sungai Penuh', 'provinsi_id' => 8],
            ['kota' => 'Kab. Bangalan', 'provinsi_id' => 9],
            ['kota' => 'Kab. Banyuwangi', 'provinsi_id' => 9],
            ['kota' => 'Kab. Blitar', 'provinsi_id' => 9],
            ['kota' => 'Kab. Bojonegoro', 'provinsi_id' => 9],
            ['kota' => 'Kab. Bondowoso', 'provinsi_id' => 9],
            ['kota' => 'Kab. Gresik', 'provinsi_id' => 9],
            ['kota' => 'Kab. Jember', 'provinsi_id' => 9],
            ['kota' => 'Kab. Jombang', 'provinsi_id' => 9],
            ['kota' => 'Kab. Kediri', 'provinsi_id' => 9],
            ['kota' => 'Kab. Lamongan', 'provinsi_id' => 9],
            ['kota' => 'Kab. Lumajang', 'provinsi_id' => 9],
            ['kota' => 'Kab. Madiun', 'provinsi_id' => 9],
            ['kota' => 'Kab. Magetan', 'provinsi_id' => 9],
            ['kota' => 'Kab. Malang', 'provinsi_id' => 9],
            ['kota' => 'Kab. Mojokerto', 'provinsi_id' => 9],
            ['kota' => 'Kab. Nganjuk', 'provinsi_id' => 9],
            ['kota' => 'Kab. Ngawi', 'provinsi_id' => 9],
            ['kota' => 'Kab. Pacitan', 'provinsi_id' => 9],
            ['kota' => 'Kab. Pamekasan', 'provinsi_id' => 9],
            ['kota' => 'Kab. Pasuruan', 'provinsi_id' => 9],
            ['kota' => 'Kab. Ponorogo', 'provinsi_id' => 9],
            ['kota' => 'Kab. Probolinggo', 'provinsi_id' => 9],
            ['kota' => 'Kab. Sampang', 'provinsi_id' => 9],
            ['kota' => 'Kab. Sidoarjo', 'provinsi_id' => 9],
            ['kota' => 'Kab. Situbondo', 'provinsi_id' => 9],
            ['kota' => 'Kab. Sumenep', 'provinsi_id' => 9],
            ['kota' => 'Kab. Trenggalek', 'provinsi_id' => 9],
            ['kota' => 'Kab. Tuban', 'provinsi_id' => 9],
            ['kota' => 'Kab. Tulungagung', 'provinsi_id' => 9],
            ['kota' => 'Kota Batu', 'provinsi_id' => 9],
            ['kota' => 'Kota Blitar', 'provinsi_id' => 9],
            ['kota' => 'Kota Kediri', 'provinsi_id' => 9],
            ['kota' => 'Kota Madiun', 'provinsi_id' => 9],
            ['kota' => 'Kota Malang', 'provinsi_id' => 9],
            ['kota' => 'Kota Mojokerto', 'provinsi_id' => 9],
            ['kota' => 'Kota Pasuruan', 'provinsi_id' => 9],
            ['kota' => 'Kota Probolinggo', 'provinsi_id' => 9],
            ['kota' => 'Kota Surabaya', 'provinsi_id' => 9],
            ['kota' => 'Kab. Banjarnegara', 'provinsi_id' => 10],
            ['kota' => 'Kab. Banyumas', 'provinsi_id' => 10],
            ['kota' => 'Kab. Batang', 'provinsi_id' => 10],
            ['kota' => 'Kab. Blora', 'provinsi_id' => 10],
            ['kota' => 'Kab. Boyolali', 'provinsi_id' => 10],
            ['kota' => 'Kab. Brebes', 'provinsi_id' => 10],
            ['kota' => 'Kab. Cilacap', 'provinsi_id' => 10],
            ['kota' => 'Kab. Demak', 'provinsi_id' => 10],
            ['kota' => 'Kab. Purwodadi', 'provinsi_id' => 10],
            ['kota' => 'Kab. Grobongan', 'provinsi_id' => 10],
            ['kota' => 'Kab. Jepara', 'provinsi_id' => 10],
            ['kota' => 'Kab. Karanganyar', 'provinsi_id' => 10],
            ['kota' => 'Kab. Kebumen', 'provinsi_id' => 10],
            ['kota' => 'Kab. Kendal', 'provinsi_id' => 10],
            ['kota' => 'Kab. Klaten', 'provinsi_id' => 10],
            ['kota' => 'Kab. Kudus', 'provinsi_id' => 10],
            ['kota' => 'Kab. Magelang', 'provinsi_id' => 10],
            ['kota' => 'Kab. Pati', 'provinsi_id' => 10],
            ['kota' => 'Kab. Pekalongan', 'provinsi_id' => 10],
            ['kota' => 'Kab. Pemalang', 'provinsi_id' => 10],
            ['kota' => 'Kab. Purablingga', 'provinsi_id' => 10],
            ['kota' => 'Kab. Purworejo', 'provinsi_id' => 10],
            ['kota' => 'Kab. Rembang', 'provinsi_id' => 10],
            ['kota' => 'Kab. Semarang', 'provinsi_id' => 10],
            ['kota' => 'Kab. Sragen', 'provinsi_id' => 10],
            ['kota' => 'Kab. Sukoharjo', 'provinsi_id' => 10],
            ['kota' => 'Kab. Tegal', 'provinsi_id' => 10],
            ['kota' => 'Kab. Temanggung', 'provinsi_id' => 10],
            ['kota' => 'Kab. Wonogiri', 'provinsi_id' => 10],
            ['kota' => 'Kab. Wonosobo', 'provinsi_id' => 10],
            ['kota' => 'Kota Magelang', 'provinsi_id' => 10],
            ['kota' => 'Kota Pekalongan', 'provinsi_id' => 10],
            ['kota' => 'Kota Salatiga', 'provinsi_id' => 10],
            ['kota' => 'Kota Semarang', 'provinsi_id' => 10],
            ['kota' => 'Kota Surakarta', 'provinsi_id' => 10],
            ['kota' => 'Kota Tegal', 'provinsi_id' => 10],
            ['kota' => 'Kab. Bandung', 'provinsi_id' => 11],
            ['kota' => 'Kab. Bandung Barat', 'provinsi_id' => 11],
            ['kota' => 'Kab. Bekasi', 'provinsi_id' => 11],
            ['kota' => 'Kab. Bogor', 'provinsi_id' => 11],
            ['kota' => 'Kab. Ciamis', 'provinsi_id' => 11],
            ['kota' => 'Kab. Cianjur', 'provinsi_id' => 11],
            ['kota' => 'Kab. Cirebon', 'provinsi_id' => 11],
            ['kota' => 'Kab. Garut', 'provinsi_id' => 11],
            ['kota' => 'Kab. Indramayu', 'provinsi_id' => 11],
            ['kota' => 'Kab. Karawang', 'provinsi_id' => 11],
            ['kota' => 'Kab. Kuningan', 'provinsi_id' => 11],
            ['kota' => 'Kab. Majalengka', 'provinsi_id' => 11],
            ['kota' => 'Kab. Pangandaran', 'provinsi_id' => 11],
            ['kota' => 'Kab. Purwakarta', 'provinsi_id' => 11],
            ['kota' => 'Kab. Subang', 'provinsi_id' => 11],
            ['kota' => 'Kab. Sukabumi', 'provinsi_id' => 11],
            ['kota' => 'Kab. Sumedang', 'provinsi_id' => 11],
            ['kota' => 'Kab. Tasikmalaya', 'provinsi_id' => 11],
            ['kota' => 'Kota Bandung', 'provinsi_id' => 11],
            ['kota' => 'Kota Banjar', 'provinsi_id' => 11],
            ['kota' => 'Kota Bekasi', 'provinsi_id' => 11],
            ['kota' => 'Kota Bogor', 'provinsi_id' => 11],
            ['kota' => 'Kota Cimahi', 'provinsi_id' => 11],
            ['kota' => 'Kota Cirebon', 'provinsi_id' => 11],
            ['kota' => 'Kota Depok', 'provinsi_id' => 11],
            ['kota' => 'Kota Sukabumi', 'provinsi_id' => 11],
            ['kota' => 'Kota Tasikmalaya', 'provinsi_id' => 11],
            ['kota' => 'Kab. Berau', 'provinsi_id' => 12],
            ['kota' => 'Kab. Kutai Barat', 'provinsi_id' => 12],
            ['kota' => 'Kab. Kutai Kartanegara', 'provinsi_id' => 12],
            ['kota' => 'Kab. Kutai Timur', 'provinsi_id' => 12],
            ['kota' => 'Kab. Mahakam Ulu', 'provinsi_id' => 12],
            ['kota' => 'Kab. Paser', 'provinsi_id' => 12],
            ['kota' => 'Kab. Paser Utara', 'provinsi_id' => 12],
            ['kota' => 'Kota Balikpapan', 'provinsi_id' => 12],
            ['kota' => 'Kota Bontang', 'provinsi_id' => 12],
            ['kota' => 'Kota Samarinda', 'provinsi_id' => 12],
            ['kota' => 'Kab. Bengkayang', 'provinsi_id' => 13],
            ['kota' => 'Kab. Kapuas Hulu', 'provinsi_id' => 13],
            ['kota' => 'Kab. Kayong Utara', 'provinsi_id' => 13],
            ['kota' => 'Kab. Ketapang', 'provinsi_id' => 13],
            ['kota' => 'Kab. Kubu Raya', 'provinsi_id' => 13],
            ['kota' => 'Kab. Landak', 'provinsi_id' => 13],
            ['kota' => 'Kab. Melawi', 'provinsi_id' => 13],
            ['kota' => 'Kab. Mempawah', 'provinsi_id' => 13],
            ['kota' => 'Kab. Sambas', 'provinsi_id' => 13],
            ['kota' => 'Kab. Sanggau', 'provinsi_id' => 13],
            ['kota' => 'Kab. Sekadau', 'provinsi_id' => 13],
            ['kota' => 'Kab. Sintang', 'provinsi_id' => 13],
            ['kota' => 'Kab. Pontianak', 'provinsi_id' => 13],
            ['kota' => 'Kab. Singkawang', 'provinsi_id' => 13],
            ['kota' => 'Kab. Balangan', 'provinsi_id' => 14],
            ['kota' => 'Kab. Banjar', 'provinsi_id' => 14],
            ['kota' => 'Kab. Barito Kuala', 'provinsi_id' => 14],
            ['kota' => 'Kab. Hulu Sungai Selatan', 'provinsi_id' => 14],
            ['kota' => 'Kab. Hulu Sungai Tengah', 'provinsi_id' => 14],
            ['kota' => 'Kab. Hulu Sungai Utara', 'provinsi_id' => 14],
            ['kota' => 'Kab. Kotabaru', 'provinsi_id' => 14],
            ['kota' => 'Kab. Tabalong', 'provinsi_id' => 14],
            ['kota' => 'Kab. Tanah Bumbu', 'provinsi_id' => 14],
            ['kota' => 'Kab. Tanah Laut', 'provinsi_id' => 14],
            ['kota' => 'Kab. tapin', 'provinsi_id' => 14],
            ['kota' => 'Kota Banjarbaru', 'provinsi_id' => 14],
            ['kota' => 'Kota Banjarmasin', 'provinsi_id' => 14],
            ['kota' => 'Kab. Bulungan', 'provinsi_id' => 15],
            ['kota' => 'Kab. Malinau', 'provinsi_id' => 15],
            ['kota' => 'Kab. Nunukan', 'provinsi_id' => 15],
            ['kota' => 'Kab. Tana Tidung', 'provinsi_id' => 15],
            ['kota' => 'Kota Tanjung Selor', 'provinsi_id' => 15],
            ['kota' => 'Kota Tarakan', 'provinsi_id' => 15],
            ['kota' => 'Kab. Lampung Barat', 'provinsi_id' => 16],
            ['kota' => 'Kab. Lampung Selatan', 'provinsi_id' => 16],
            ['kota' => 'Kab. Lampung Tengah', 'provinsi_id' => 16],
            ['kota' => 'Kab. Lampung Timur', 'provinsi_id' => 16],
            ['kota' => 'Kab. Lampung Utara', 'provinsi_id' => 16],
            ['kota' => 'Kab. Mesuji', 'provinsi_id' => 16],
            ['kota' => 'Kab. Pesawaran', 'provinsi_id' => 16],
            ['kota' => 'Kab. Pesisir Barat', 'provinsi_id' => 16],
            ['kota' => 'Kab. Pringsewu', 'provinsi_id' => 16],
            ['kota' => 'Kab. Tanggamus', 'provinsi_id' => 16],
            ['kota' => 'Kab. Tulang Bawang', 'provinsi_id' => 16],
            ['kota' => 'Kab. Tulang Bawang Barat', 'provinsi_id' => 16],
            ['kota' => 'Kab. Way Kanan', 'provinsi_id' => 16],
            ['kota' => 'Kota Bandar Lampung', 'provinsi_id' => 16],
            ['kota' => 'Kota Metro', 'provinsi_id' => 16],
            ['kota' => 'Kab. Buru', 'provinsi_id' => 17],
            ['kota' => 'Kab. Buru Selatan', 'provinsi_id' => 17],
            ['kota' => 'Kab. Kepulauan Aru', 'provinsi_id' => 17],
            ['kota' => 'Kab. Kepulauan Tanimbar', 'provinsi_id' => 17],
            ['kota' => 'Kab. Maluku Barat Daya', 'provinsi_id' => 17],
            ['kota' => 'Kab. Maluku Tengah', 'provinsi_id' => 17],
            ['kota' => 'Kab. Maluku Tenggara', 'provinsi_id' => 17],
            ['kota' => 'Kab. Seram Bagian Barat', 'provinsi_id' => 17],
            ['kota' => 'Kab. Seram Bagian Timur', 'provinsi_id' => 17],
            ['kota' => 'Kota Ambon', 'provinsi_id' => 17],
            ['kota' => 'Kota Tual', 'provinsi_id' => 17],
            ['kota' => 'Kab. Halmahera Barat', 'provinsi_id' => 18],
            ['kota' => 'Kab. Halmahera Tengah', 'provinsi_id' => 18],
            ['kota' => 'Kab. Halmahera Timur', 'provinsi_id' => 18],
            ['kota' => 'Kab. Halmahera Selatan', 'provinsi_id' => 18],
            ['kota' => 'Kab. Halmahera Utara', 'provinsi_id' => 18],
            ['kota' => 'Kab. Kepulauan Sula', 'provinsi_id' => 18],
            ['kota' => 'Kab. Pulau Morotai', 'provinsi_id' => 18],
            ['kota' => 'Kab. Pulau Taliabu', 'provinsi_id' => 18],
            ['kota' => 'Kota Ternate', 'provinsi_id' => 18],
            ['kota' => 'Kota Tidore Kepulauan', 'provinsi_id' => 18],
            ['kota' => 'Kab. Bima', 'provinsi_id' => 19],
            ['kota' => 'Kab. Dompu', 'provinsi_id' => 19],
            ['kota' => 'Kab. Lombok Barat', 'provinsi_id' => 19],
            ['kota' => 'Kab. Lombok Tengah', 'provinsi_id' => 19],
            ['kota' => 'Kab. Lombok Timur', 'provinsi_id' => 19],
            ['kota' => 'Kab. Lombok Utara', 'provinsi_id' => 19],
            ['kota' => 'Kab. Sumbawa', 'provinsi_id' => 19],
            ['kota' => 'Kab. Sumbawa Barat', 'provinsi_id' => 19],
            ['kota' => 'Kota Bima', 'provinsi_id' => 19],
            ['kota' => 'Kota Mataram', 'provinsi_id' => 19],
            ['kota' => 'Kab. Alor', 'provinsi_id' => 20],
            ['kota' => 'Kab. Belu', 'provinsi_id' => 20],
            ['kota' => 'Kab. Ende', 'provinsi_id' => 20],
            ['kota' => 'Kab. Flores Timur', 'provinsi_id' => 20],
            ['kota' => 'Kab. Kupang', 'provinsi_id' => 20],
            ['kota' => 'Kab. Lembata', 'provinsi_id' => 20],
            ['kota' => 'Kab. Malaka', 'provinsi_id' => 20],
            ['kota' => 'Kab. Manggarai', 'provinsi_id' => 20],
            ['kota' => 'Kab. Manggarai Barat', 'provinsi_id' => 20],
            ['kota' => 'Kab. Manggarai Timur', 'provinsi_id' => 20],
            ['kota' => 'Kab. Nagekeo', 'provinsi_id' => 20],
            ['kota' => 'Kab. Ngada', 'provinsi_id' => 20],
            ['kota' => 'Kab. Rote Ndao', 'provinsi_id' => 20],
            ['kota' => 'Kab. Sabu Raijua', 'provinsi_id' => 20],
            ['kota' => 'Kab. Sikka', 'provinsi_id' => 20],
            ['kota' => 'Kab. Sumba Barat', 'provinsi_id' => 20],
            ['kota' => 'Kab. Sumba Barat Daya', 'provinsi_id' => 20],
            ['kota' => 'Kab. Sumba Tengah', 'provinsi_id' => 20],
            ['kota' => 'Kab. Sumba Timur', 'provinsi_id' => 20],
            ['kota' => 'Kab. Timor Tengah Selatan', 'provinsi_id' => 20],
            ['kota' => 'Kab. Timor Tengah Utara', 'provinsi_id' => 20],
            ['kota' => 'Kota Kupang', 'provinsi_id' => 20],
            ['kota' => 'Kab. Asmat', 'provinsi_id' => 21],
            ['kota' => 'Kab. Biak Numfor', 'provinsi_id' => 21],
            ['kota' => 'Kab. Boven Digoel', 'provinsi_id' => 21],
            ['kota' => 'Kab. Deiyai', 'provinsi_id' => 21],
            ['kota' => 'Kab. Dogiyai', 'provinsi_id' => 21],
            ['kota' => 'Kab. Intan Jaya', 'provinsi_id' => 21],
            ['kota' => 'Kab. Jayapura', 'provinsi_id' => 21],
            ['kota' => 'Kab. Jayawijaya', 'provinsi_id' => 21],
            ['kota' => 'Kab. Keerom', 'provinsi_id' => 21],
            ['kota' => 'Kab. Kepulauan Yapen', 'provinsi_id' => 21],
            ['kota' => 'Kab. Lanny Jaya', 'provinsi_id' => 21],
            ['kota' => 'Kab. Mamberamo Raya', 'provinsi_id' => 21],
            ['kota' => 'Kab. Mamberamo Tengah', 'provinsi_id' => 21],
            ['kota' => 'Kab. Mappi', 'provinsi_id' => 21],
            ['kota' => 'Kab. Merauke', 'provinsi_id' => 21],
            ['kota' => 'Kab. Mimika', 'provinsi_id' => 21],
            ['kota' => 'Kab. Nabire', 'provinsi_id' => 21],
            ['kota' => 'Kab. Nduga', 'provinsi_id' => 21],
            ['kota' => 'Kab. Paniai', 'provinsi_id' => 21],
            ['kota' => 'Kab. Pegunungan Bintang', 'provinsi_id' => 21],
            ['kota' => 'Kab. Puncak', 'provinsi_id' => 21],
            ['kota' => 'Kab. Puncak Jaya', 'provinsi_id' => 21],
            ['kota' => 'Kab. Puncak Jaya', 'provinsi_id' => 21],
            ['kota' => 'Kab. Sarmi', 'provinsi_id' => 21],
            ['kota' => 'Kab. Supiori', 'provinsi_id' => 21],
            ['kota' => 'Kab. Tolikara', 'provinsi_id' => 21],
            ['kota' => 'Kab. Waropen', 'provinsi_id' => 21],
            ['kota' => 'Kab. Yahukimo', 'provinsi_id' => 21],
            ['kota' => 'Kab. Yalimo', 'provinsi_id' => 21],
            ['kota' => 'Kota Jayapura', 'provinsi_id' => 21],
            ['kota' => 'Kab. Fakfak', 'provinsi_id' => 22],
            ['kota' => 'Kab. Kaimana', 'provinsi_id' => 22],
            ['kota' => 'Kab. Manokwari', 'provinsi_id' => 22],
            ['kota' => 'Kab. Manokwari Selatan', 'provinsi_id' => 22],
            ['kota' => 'Kab. Maybrat', 'provinsi_id' => 22],
            ['kota' => 'Kab. Pegunungan Arfak', 'provinsi_id' => 22],
            ['kota' => 'Kab. Raja Ampat', 'provinsi_id' => 22],
            ['kota' => 'Kab. Sorong', 'provinsi_id' => 22],
            ['kota' => 'Kab. Sorong Selatan', 'provinsi_id' => 22],
            ['kota' => 'Kab. Tambrauw', 'provinsi_id' => 22],
            ['kota' => 'Kab. Teluk Bintuni', 'provinsi_id' => 22],
            ['kota' => 'Kab. Teluk Wondama', 'provinsi_id' => 22],
            ['kota' => 'Kota Manokwari', 'provinsi_id' => 22],
            ['kota' => 'Kota Sorong', 'provinsi_id' => 22],
            ['kota' => 'Kab. Bengkalis', 'provinsi_id' => 23],
            ['kota' => 'Kab. Indragiri Hilir', 'provinsi_id' => 23],
            ['kota' => 'Kab. Indragiri Hulu', 'provinsi_id' => 23],
            ['kota' => 'Kab. Kampar', 'provinsi_id' => 23],
            ['kota' => 'Kab. Kepulauan Meranti', 'provinsi_id' => 23],
            ['kota' => 'Kab. Kuantan Singingi', 'provinsi_id' => 23],
            ['kota' => 'Kab. Kabupaten Pelalawan', 'provinsi_id' => 23],
            ['kota' => 'Kab. Rokan Hilir', 'provinsi_id' => 23],
            ['kota' => 'Kab. Rokan Hulu', 'provinsi_id' => 23],
            ['kota' => 'Kab. Siak', 'provinsi_id' => 23],
            ['kota' => 'Kota Dumai', 'provinsi_id' => 23],
            ['kota' => 'Kota Pekanbaru', 'provinsi_id' => 23],
            ['kota' => 'Kab. Agam', 'provinsi_id' => 24],
            ['kota' => 'Kab. Dharmasraya', 'provinsi_id' => 24],
            ['kota' => 'Kab. Kepulauan Mentawai', 'provinsi_id' => 24],
            ['kota' => 'Kab. Lima Puluh Kota', 'provinsi_id' => 24],
            ['kota' => 'Kab. Padang Pariaman', 'provinsi_id' => 24],
            ['kota' => 'Kab. Pasaman', 'provinsi_id' => 24],
            ['kota' => 'Kab. Pasaman Barat', 'provinsi_id' => 24],
            ['kota' => 'Kab. Pesisir Selatan', 'provinsi_id' => 24],
            ['kota' => 'Kab. Sijunjung', 'provinsi_id' => 24],
            ['kota' => 'Kab. Solok', 'provinsi_id' => 24],
            ['kota' => 'Kab. Solok Selatan', 'provinsi_id' => 24],
            ['kota' => 'Kab. Tanah Datar', 'provinsi_id' => 24],
            ['kota' => 'Kota Bukit Tinggi', 'provinsi_id' => 24],
            ['kota' => 'Kota Padang', 'provinsi_id' => 24],
            ['kota' => 'Kota Padang Panjang', 'provinsi_id' => 24],
            ['kota' => 'Kota Pariaman', 'provinsi_id' => 24],
            ['kota' => 'Kota Payakumbuh', 'provinsi_id' => 24],
            ['kota' => 'Kota Sawahlunto', 'provinsi_id' => 24],
            ['kota' => 'Kota Solok', 'provinsi_id' => 24],
            ['kota' => 'Kab. Banyuasin', 'provinsi_id' => 25],
            ['kota' => 'Kab. Empat Lawang', 'provinsi_id' => 25],
            ['kota' => 'Kab. Lahat', 'provinsi_id' => 25],
            ['kota' => 'Kab. Muara Enim', 'provinsi_id' => 25],
            ['kota' => 'Kab. Musi Banyuasin', 'provinsi_id' => 25],
            ['kota' => 'Kab. Musi Rawas', 'provinsi_id' => 25],
            ['kota' => 'Kab. Musi Rawas Utara', 'provinsi_id' => 25],
            ['kota' => 'Kab. Ogan Ilir', 'provinsi_id' => 25],
            ['kota' => 'Kab. Ogan Komering Ilir', 'provinsi_id' => 25],
            ['kota' => 'Kab. Ogan Komering Ulu', 'provinsi_id' => 25],
            ['kota' => 'Kab. Ogan Komering Ulu Selatan', 'provinsi_id' => 25],
            ['kota' => 'Kab. Ogan Komering Ulu Timur', 'provinsi_id' => 25],
            ['kota' => 'Kab. Penukal Abab Lematang', 'provinsi_id' => 25],
            ['kota' => 'Kota Lubulinggau', 'provinsi_id' => 25],
            ['kota' => 'Kota Pagar Alam', 'provinsi_id' => 25],
            ['kota' => 'Kota Palembang', 'provinsi_id' => 25],
            ['kota' => 'Kota Prabumulih', 'provinsi_id' => 25],
            ['kota' => 'Kab. Asahan', 'provinsi_id' => 26],
            ['kota' => 'Kab. Batu Bara', 'provinsi_id' => 26],
            ['kota' => 'Kab. Dairi', 'provinsi_id' => 26],
            ['kota' => 'Kab. Deli Serdang', 'provinsi_id' => 26],
            ['kota' => 'Kab. Humbang Hasundutan', 'provinsi_id' => 26],
            ['kota' => 'Kab. Karo', 'provinsi_id' => 26],
            ['kota' => 'Kab. Labuhanbatu', 'provinsi_id' => 26],
            ['kota' => 'Kab. Labuhanbatu Selatan', 'provinsi_id' => 26],
            ['kota' => 'Kab. Labuhan Utara', 'provinsi_id' => 26],
            ['kota' => 'Kab. Langkat', 'provinsi_id' => 26],
            ['kota' => 'Kab. Mandailing Natal', 'provinsi_id' => 26],
            ['kota' => 'Kab. Nias', 'provinsi_id' => 26],
            ['kota' => 'Kab. Nias Barat', 'provinsi_id' => 26],
            ['kota' => 'Kab. Nias Selatan', 'provinsi_id' => 26],
            ['kota' => 'Kab. Nias Utara', 'provinsi_id' => 26],
            ['kota' => 'Kab. Padang Lawas', 'provinsi_id' => 26],
            ['kota' => 'Kab. Padang Lawas Utara', 'provinsi_id' => 26],
            ['kota' => 'Kab. Pakpak Bharat', 'provinsi_id' => 26],
            ['kota' => 'Kab. Samosir', 'provinsi_id' => 26],
            ['kota' => 'Kab. Serdang Bedagai', 'provinsi_id' => 26],
            ['kota' => 'Kab. Simalungun', 'provinsi_id' => 26],
            ['kota' => 'Kab. Tapanuli Selatan', 'provinsi_id' => 26],
            ['kota' => 'Kab. Tapanuli Tengah', 'provinsi_id' => 26],
            ['kota' => 'Kab. Tapanuli Utara', 'provinsi_id' => 26],
            ['kota' => 'Kab. Toba', 'provinsi_id' => 26],
            ['kota' => 'Kota Binjai', 'provinsi_id' => 26],
            ['kota' => 'Kota Gunungsitoli', 'provinsi_id' => 26],
            ['kota' => 'Kota Medan', 'provinsi_id' => 26],
            ['kota' => 'Kota Padang Sidempuan', 'provinsi_id' => 26],
            ['kota' => 'Kota Pematangsiantar', 'provinsi_id' => 26],
            ['kota' => 'Kota Sibolga', 'provinsi_id' => 26],
            ['kota' => 'Kota Tanjungbalai', 'provinsi_id' => 26],
            ['kota' => 'Kota Tebing Tinggi', 'provinsi_id' => 26],
            ['kota' => 'Kab. Majene', 'provinsi_id' => 27],
            ['kota' => 'Kab. Mamasa', 'provinsi_id' => 27],
            ['kota' => 'Kab. Mamuju', 'provinsi_id' => 27],
            ['kota' => 'Kab. Mamuju Tengah', 'provinsi_id' => 27],
            ['kota' => 'Kab. Pasangkayu', 'provinsi_id' => 27],
            ['kota' => 'Kab. Polewali Mandar', 'provinsi_id' => 27],
            ['kota' => 'Kota Mamuju', 'provinsi_id' => 27],
            ['kota' => 'Kab. Bantaeng', 'provinsi_id' => 28],
            ['kota' => 'Kab. Barru', 'provinsi_id' => 28],
            ['kota' => 'Kab. Bone', 'provinsi_id' => 28],
            ['kota' => 'Kab. Bulukumba', 'provinsi_id' => 28],
            ['kota' => 'Kab. Enrekang', 'provinsi_id' => 28],
            ['kota' => 'Kab. Gowa', 'provinsi_id' => 28],
            ['kota' => 'Kab. Jeneponto', 'provinsi_id' => 28],
            ['kota' => 'Kab. Kepulauan Selayat', 'provinsi_id' => 28],
            ['kota' => 'Kab. Luwu', 'provinsi_id' => 28],
            ['kota' => 'Kab. Luwu Timur', 'provinsi_id' => 28],
            ['kota' => 'Kab. Luwu Utara', 'provinsi_id' => 28],
            ['kota' => 'Kab. Maros', 'provinsi_id' => 28],
            ['kota' => 'Kab. Pangkajene dan Kepulauan', 'provinsi_id' => 28],
            ['kota' => 'Kab. Pinrang', 'provinsi_id' => 28],
            ['kota' => 'Kab. Sidenreng Rappang', 'provinsi_id' => 28],
            ['kota' => 'Kab. Sinjai', 'provinsi_id' => 28],
            ['kota' => 'Kab. Soppeng', 'provinsi_id' => 28],
            ['kota' => 'Kab. Takalar', 'provinsi_id' => 28],
            ['kota' => 'Kab. Tana Toraja', 'provinsi_id' => 28],
            ['kota' => 'Kab. Toraja Utara', 'provinsi_id' => 28],
            ['kota' => 'Kab. Wajo', 'provinsi_id' => 28],
            ['kota' => 'Kota Makassar', 'provinsi_id' => 28],
            ['kota' => 'Kota Palopo', 'provinsi_id' => 28],
            ['kota' => 'Kota Parepare', 'provinsi_id' => 28],
            ['kota' => 'Kab. Banggai', 'provinsi_id' => 29],
            ['kota' => 'Kab. Banggai Kepulauan', 'provinsi_id' => 29],
            ['kota' => 'Kab. Banggai Laut', 'provinsi_id' => 29],
            ['kota' => 'Kab. Buol', 'provinsi_id' => 29],
            ['kota' => 'Kab. Donggala', 'provinsi_id' => 29],
            ['kota' => 'Kab. Morowali', 'provinsi_id' => 29],
            ['kota' => 'Kab. Morowali Utara', 'provinsi_id' => 29],
            ['kota' => 'Kab. Parigi Moutong', 'provinsi_id' => 29],
            ['kota' => 'Kab. Poso', 'provinsi_id' => 29],
            ['kota' => 'Kab. Sigi', 'provinsi_id' => 29],
            ['kota' => 'Kab. Tojo Una-Una', 'provinsi_id' => 29],
            ['kota' => 'Kab. Tolitoli', 'provinsi_id' => 29],
            ['kota' => 'Kota Palu', 'provinsi_id' => 29],
            ['kota' => 'Kab. Bombana', 'provinsi_id' => 30],
            ['kota' => 'Kab. Buton', 'provinsi_id' => 30],
            ['kota' => 'Kab. Buton Selatan', 'provinsi_id' => 30],
            ['kota' => 'Kab. Buton Tengah', 'provinsi_id' => 30],
            ['kota' => 'Kab. Buton Utara', 'provinsi_id' => 30],
            ['kota' => 'Kab. Kolaka', 'provinsi_id' => 30],
            ['kota' => 'Kab. Kolaka Timur', 'provinsi_id' => 30],
            ['kota' => 'Kab. Kolaka Utara', 'provinsi_id' => 30],
            ['kota' => 'Kab. Konawe', 'provinsi_id' => 30],
            ['kota' => 'Kab. Konawe Kepulauan', 'provinsi_id' => 30],
            ['kota' => 'Kab. Konawe Selatan', 'provinsi_id' => 30],
            ['kota' => 'Kab. Konawe Utara', 'provinsi_id' => 30],
            ['kota' => 'Kab. Muna', 'provinsi_id' => 30],
            ['kota' => 'Kab. Muna Barat', 'provinsi_id' => 30],
            ['kota' => 'Kab. Wakatobi', 'provinsi_id' => 30],
            ['kota' => 'Kota Baubau', 'provinsi_id' => 30],
            ['kota' => 'Kota Kendari', 'provinsi_id' => 30],
        ]);
    }
}
