<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRkasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_rkas', function (Blueprint $table) {
            $table->increments('id_rkas');
            $table->integer('tahun_anggaran');
            $table->integer('total_dana');
            $table->integer('dana_terpakai');
            $table->integer('sisa_dana');
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
        Schema::dropIfExists('tb_rkas');
    }
}
