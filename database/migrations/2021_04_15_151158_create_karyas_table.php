<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaryasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('event_id');
            $table->string('jenjang');
            $table->enum('kategori', ['Desain Grafis', 'Aplikasi & Game', 'Food & Beverage', 'Fashion', 'Kriya']);
            $table->text('foto_tim');
            $table->text('foto_poster');
            $table->text('tentang_tim');
            $table->string('nama');
            $table->text('deskripsi');
            $table->text('link_profil');
            $table->text('link_presentation');
            $table->text('link_mockup');
            $table->text('proposal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('karyas');
    }
}
