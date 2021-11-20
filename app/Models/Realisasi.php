<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Realisasi extends Model
{
    use HasFactory;
    protected $table = 'tb_realisasi';
    protected $primaryKey = 'id_realisasi';
    protected $fillable = ['id_pengguna', 'id_pengajuan', 'id_rkas', 'f_waktu', 'f_volume', 'f_satuan', 'f_harga_satuan', 'f_total_belanja', 'f_rincian', 'progress'];

    public function pengguna(){
        return $this->belongsTo('App\Models\Pengguna', 'id_pengguna');
    }

    public function pengajuan(){
        return $this->belongsTo('App\Models\Pengajuan', 'id_pengajuan');
    }

    public function rkas(){
        return $this->belongsTo('App\Models\RKAS', 'id_rkas');
    }
}
