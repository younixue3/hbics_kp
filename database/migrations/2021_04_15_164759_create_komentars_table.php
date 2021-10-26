<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomentarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komentars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('komentar');
            $table->string('liked');
            $table->string('status');
            $table->timestamps();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('karya_id');
            $table->foreign('karya_id')->references('id')->on('karyas');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('komentars');
    }
}
