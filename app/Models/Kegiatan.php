<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;
    protected $table = 'tb_kegiatan';
    protected $primaryKey = 'id_kegiatan';
    protected $fillable = ['id_pengguna', 'nama_kegiatan', 'bln_pelaksanaan'];

    public function pengguna(){
        return $this->belongsTo('App\Models\Pengguna', 'id_pengguna');
    }

    public function pengajuan(){
        return $this->hasMany('App\Models\Pengajuan');
    }
}
