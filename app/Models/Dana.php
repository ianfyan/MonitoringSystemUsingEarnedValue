<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dana extends Model
{
    use HasFactory; 
    protected $table = 'tb_detail_dana';
    protected $primaryKey = 'id_dana';
    protected $fillable = ['id_sumber', 'id_rkas', 'jumlah_dana'];

    public function rkas(){
        return $this->belongsTo('App\Models\Rkas', 'id_rkas');
    }

    public function sumber(){
        return $this->belongsTo('App\Models\Sumber', 'id_sumber');
    }
}
