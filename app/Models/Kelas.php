<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mahasiswa;

class Kelas extends Model
{
    use HasFactory;
    protected $table='kelas';//Mendefinisikan model ini terkait dengan table kelas
    public function mahasiswa(){
        return $this->hasMany(Mahasiswa::Class);
    }
}
