<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekening extends Model
{
    use HasFactory; 
    protected $table = 'tb_rekening';
    protected $primaryKey = 'id_rekening';
    protected $fillable = ['id_jenis', 'nomer_rekening', 'nama_rekening'];

    public function jenis(){
        return $this->belongsTo('App\Models\Jenis', 'id_jenis');
    }

    public function detail(){
        return $this->hasMany('App\Models\Detail', 'id_rekening');
    }
}
