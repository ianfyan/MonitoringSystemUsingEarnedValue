<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealisasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_realisasi', function (Blueprint $table) {
            $table->increments('id_realisasi');
            $table->integer('id_rkas');
            $table->integer('id_pengajuan');
            $table->integer('id_jenis');
            $table->string('f_nama_kegiatan', 100);
            $table->integer('f_volume');
            $table->integer('f_harga_satuan');
            $table->integer('f_total_belanja');
            $table->string('f_rincian', 100);
            $table->date('tgl_persetujuan');
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
        Schema::dropIfExists('tb_realisasi');
    }
}
