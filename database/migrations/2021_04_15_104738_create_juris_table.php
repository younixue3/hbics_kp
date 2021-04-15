<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJurisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('juris', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('event_id');
            $table->text('foto');
            $table->string('nama');
            $table->string('url_profil');
            $table->text('quote');
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
        Schema::dropIfExists('juris');
    }
}
