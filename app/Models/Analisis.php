<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Analisis extends Model
{
    use HasFactory;
    protected $table = 'tb_analisis';
    protected $primaryKey = 'id_analisis';
    protected $fillable = ['id_rkas', 'nilai_bcws', 'nilai_bcwp', 'nilai_acwp', 'nilai_spi', 'nilai_cpi'];
    
    public function rkas(){
        return $this->belongsTo('App\Models\Rkas', 'id_rkas');
    }
}
