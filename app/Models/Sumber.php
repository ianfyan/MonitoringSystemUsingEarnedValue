<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sumber extends Model
{
    use HasFactory;
    protected $table = 'tb_sumber_dana';
    protected $primaryKey = 'id_sumber';
    protected $fillable = ['nama_sumber'];

    public function dana(){
        return $this->hasMany('App\Models\Dana');
    }
}
