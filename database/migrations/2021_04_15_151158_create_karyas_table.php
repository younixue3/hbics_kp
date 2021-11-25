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
            $table->string('nama')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('event_id')->nullable();
            $table->unsignedBigInteger('kategori')->nullable();
            $table->text('foto_poster')->nullable();
            $table->text('deskripsi')->nullable();
            $table->text('link_profil')->nullable();
            $table->text('link_presentation')->nullable();
            $table->text('link_mockup')->nullable();
            $table->text('proposal')->nullable();
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
