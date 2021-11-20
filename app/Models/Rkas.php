<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rkas extends Model
{
    use HasFactory;
    protected $table = 'tb_rkas';
    protected $primaryKey = 'id_rkas';
    protected $fillable = ['tahun_anggaran', 'total_dana', 'dana_terpakai', 'sisa_dana'];

    public function pengajuan(){
        return $this->hasMany('App\Models\Pengajuan');
    }

    public function realisasi(){
        return $this->hasMany('App\Models\Realisasi');
    }

    public function dana(){
        return $this->hasMany('App\Models\Dana');
    }

    public function detail(){
        return $this->hasMany('App\Models\Detail');
    }

    public function analisis(){
        return $this->hasMany('App\Models\Analisis');
    }
}
