<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDanasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_detail_dana', function (Blueprint $table) {
            $table->increments('id_dana');
            $table->integer('id_sumber');
            $table->integer('id_rkas');
            $table->integer('jumlah_dana');
            $table->integer('jumlah_terpakai');
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
        Schema::dropIfExists('tb_detail_dana');
    }
}
