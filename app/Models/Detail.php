<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;
    protected $table = 'tb_detail_rkas';
    protected $primaryKey = 'id_detail_rkas';
    protected $fillable = ['id_rkas', 'id_rekening', 'r_nama_belanja', 'r_waktu', 'r_volume', 'r_satuan', 'r_harga_satuan', 'r_total_belanja', 'r_rincian'];

    public function rkas(){
        return $this->belongsTo('App\Models\Rkas', 'id_rkas');
    }

    public function rekening(){
        return $this->belongsTo('App\Models\Rekening', 'id_rekening');
    }

}
