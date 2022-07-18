<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasiens', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nik')-> unique();
            $table->string('alamat');
            $table->string('jenis_kelamin');
            $table->string('riwayat_penyakit')-> unique();
            $table->string('faskes');
            $table->string('berat_badan');
            $table->string('tinggi_badan');
            $table->string('tekanan_darah');
            $table->string('gds');
            $table->string('kolestrol');
            $table->string('create_by')-> unique();
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
        Schema::dropIfExists('pasiens');
    }
}
