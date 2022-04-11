<?php

namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Mahasiswa as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model; //Model Eloquent
use App\Models\Kelas;

class Mahasiswa extends Model
{
    protected $table='mahasiswa'; // Eloquent akan membuat model mahasiswa menyimpan record di tabel mahasiswa
     protected $primaryKey = 'Nim'; // Memanggil isi DB Dengan primarykey
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
     'Nim',
     'Nama',
     'Kelas',
     'Jurusan',
     'Email',
     'Alamat',
     'TanggalLahir',
     ];
     public function kelas(){
         return $this->belongsTo(Kelas::class);
     }
}
