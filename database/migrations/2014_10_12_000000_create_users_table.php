<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->enum('role', ['pengunjung', 'admin', 'peserta'])->default('pengunjung');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->text('foto_profile');
            $table->BigInteger('provinsi_id');
            $table->BigInteger('kota_kab_id');
            $table->BigInteger('event_id')->nullable();
            $table->unsignedBigInteger('kategori_lomba');
            $table->enum('kategori_peserta', ['individu', 'kelompok']);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
