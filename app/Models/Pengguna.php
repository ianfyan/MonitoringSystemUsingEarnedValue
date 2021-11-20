<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    use HasFactory;
    protected $table = 'tb_pengguna';
    protected $primaryKey = 'id_pengguna';
    protected $fillable = ['id_jabatan', 'nama_pengguna', 'nip_pengguna', 'jenis_kelamin', 'tgl_lahir', 'alamat_pengguna'];

    public function user(){
        return $this->hasMany('App\Models\User');
    }

    public function jabatan(){
        return $this->belongsTo('App\Models\Jabatan', 'id_jabatan');
    }

    public function pengajuan(){
        return $this->hasMany('App\Models\Pengajuan');
    }

    public function realisasi(){
        return $this->hasMany('App\Models\Realisasi');
    }

    public function kegiatan(){
        return $this->hasMany('App\Models\Kegiatan');
    }


}
