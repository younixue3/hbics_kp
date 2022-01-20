<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddJenjangToKategoriLomba extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kategori_lomba', function (Blueprint $table) {
            $table->enum('jenjang', ['kp', 'sd', 'tk'])->default('kp');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kategori_lomba', function (Blueprint $table) {
            //
        });
    }
}
