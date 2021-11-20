<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pengajuan', function (Blueprint $table) {
            $table->increments('id_pengajuan');
            $table->integer('id_pengguna');
            $table->integer('id_rkas');
            $table->integer('id_jenis');
            $table->string('nama_kegiatan', 100);
            $table->integer('volume');
            $table->integer('harga_satuan');
            $table->integer('total_belanja');
            $table->string('rincian', 100);
            $table->date('tgl_pengajuan');
            $table->string('status_pengajuan', 10);
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
        Schema::dropIfExists('tb_pengajuan');
    }
}
