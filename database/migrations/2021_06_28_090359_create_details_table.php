<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_detail_rkas', function (Blueprint $table) {
            $table->increments('id_detail_rkas');
            $table->integer('id_rkas');
            $table->integer('id_sumber');
            $table->integer('id_jenis');
            $table->string('r_nama_kegiatan', 100);
            $table->integer('r_volume');
            $table->integer('r_harga_satuan');
            $table->integer('r_total_belanja');
            $table->string('r_rincian', 100);
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
        Schema::dropIfExists('tb_detail_rkas');
    }
}
