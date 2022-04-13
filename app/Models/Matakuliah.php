<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    use HasFactory;
    protected $table='matakuliah'; // Eloquent akan membuat model mahasiswa menyimpan record di tabel mahasiswa
    protected $primaryKey = 'id'; // Memanggil isi DB Dengan primarykey
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
    'nama_matkul',
    'sks',
    'jam',
    'semester',
    ];
    public function mahasiswa_matakuliah(){
        return $this->hasMany(Mahasiswa_Matakuliah::Class);
    }
}
