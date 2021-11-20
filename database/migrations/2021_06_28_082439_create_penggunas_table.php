<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenggunasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pengguna', function (Blueprint $table) {
            $table->increments('id_pengguna');
            $table->integer('id_jabatan');
            $table->string('nama_pengguna', 100);
            $table->string('nip_pengguna', 100);
            $table->string('alamat_pengguna', 100);
            $table->char('jenis_kelamin', 1);
            $table->date('tgl_lahir');
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
        Schema::dropIfExists('tb_penggunas');
    }
}
