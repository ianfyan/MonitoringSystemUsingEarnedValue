<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnalisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_analisis', function (Blueprint $table) {
            $table->increments('id_analisis');
            $table->integer('id_rkas');
            $table->decimal('nilai_bcws', 12);
            $table->decimal('nilai_bcwp', 12);
            $table->decimal('nilai_acwp', 12);
            $table->decimal('nilai_spi', 12);
            $table->decimal('nilai_cpi', 12);
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
        Schema::dropIfExists('tb_analisis');
    }
}
