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
            $table->string('jenjang')->default('');
            $table->string('kategori')->default('');
            $table->text('foto_tim')->default('');
            $table->text('foto_poster')->default('');
            $table->text('tentang_tim')->default('');
            $table->string('nama')->default('');
            $table->text('deskripsi')->default('');
            $table->string('link_profil')->default('');
            $table->string('link_presentation')->default('');
            $table->string('link_mockup')->default('');
            $table->text('proposal')->default('');
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
