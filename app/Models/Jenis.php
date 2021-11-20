<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    use HasFactory;
    protected $table = 'tb_jenis';
    protected $primaryKey = 'id_jenis';
    protected $fillable = ['nama_jenis', 'nomer_jenis'];

    public function rekening(){
        return $this->hasMany('App\Models\Rekening', 'id_jenis');
    }
}
