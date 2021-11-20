<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table = 'tb_jabatan';
    protected $primaryKey = 'id_jabatan';
    protected $fillable = ['nama_jabatan'];

    public function pengguna(){
        return $this->hasMany('App\Models\Pengguna');
    }
}
