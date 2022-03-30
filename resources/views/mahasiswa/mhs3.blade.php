@extends('mahasiswa.layout')
@section('content')
@foreach ($mahasiswa as $mhs)
<div class="card-body">
 <ul class="list-group list-group-flush">
 <li class="list-group-item"><b>Nim: </b>{{$Mahasiswa->nim}}</li>
 <li class="list-group-item"><b>Nama: </b>{{$Mahasiswa->nama}}</li>
 <li class="list-group-item"><b>Kelas: </b>{{$Mahasiswa->kelas}}</li>
 <li class="list-group-item"><b>Jurusan: </b>{{$Mahasiswa->jurusan}}</li>
 <li class="list-group-item"><b>Email: </b>{{$Mahasiswa->email}}</li>
 <li class="list-group-item"><b>Alamat: </b>{{$Mahasiswa->alamat}}</li>
 <li class="list-group-item"><b>TanggalLahir: </b>{{$Mahasiswa->TanggalLahir}}</li>
 </ul>
 </div>
 @endforeach
 {{ $mahasiswa->links() }}