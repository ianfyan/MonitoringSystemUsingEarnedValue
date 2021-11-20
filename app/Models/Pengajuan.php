<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;
    protected $table = 'tb_pengajuan';
    protected $primaryKey = 'id_pengajuan';
    protected $fillable = ['id_pengguna', 'id_rkas', 'id_kegiatan', 'nama_belanja', 'waktu', 'volume', 'satuan', 'harga_satuan', 'total_belanja', 'rincian', 'status_pengajuan', 'realisasi'];

    public function pengguna(){
        return $this->belongsTo('App\Models\Pengguna', 'id_pengguna');
    }

    public function rkas(){
        return $this->belongsTo('App\Models\Rkas', 'id_rkas');
    }

    public function kegiatan(){
        return $this->belongsTo('App\Models\Kegiatan', 'id_kegiatan');
    }
    
    public function realisasi(){
        return $this->hasMany('App\Models\Realisasi');
    }
}
