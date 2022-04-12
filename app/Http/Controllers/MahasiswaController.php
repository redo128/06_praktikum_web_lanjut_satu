<?php
namespace App\Http\Controllers;
use App\Models\Mahasiswa;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
        {
            //fungsi eloquent menampilkan data menggunakan pagination
        //  $mahasiswa = $mahasiswa = DB::table('mahasiswa')->paginate(3); // Mengambil semua isi tabel
        //  $mahasiswa = Mahasiswa::orderBy('Nim', 'desc')->paginate(3);
        // return view('mahasiswa.index', compact('mahasiswa'));
        //  with('i', (request()->input('page', 1) - 1) * 5);
        $mahasiswa=Mahasiswa::with('kelas')->get();
        $paginate=Mahasiswa::orderby('id_mahasiswa','asc')->paginate(3);
        return view('mahasiswa.index',['mahasiswa'=>$mahasiswa,'paginate'=>$paginate]);
              //  with('i', (request()->input('page', 1) - 1) * 5);
        }
    public function create()
        {
            $Kelas=Kelas::all();//mendapatkan data dari tabel kelas
            return view('mahasiswa.create',['Kelas'=>$Kelas]);
        }
    public function store(Request $request)
        {
            //melakukan validasi data
            $request->validate([
            'Nim' => 'required',
            'Nama' => 'required',
            'Kelas' => 'required',
            'Jurusan' => 'required',
            'Email' => 'required',
            'Alamat' => 'required',
            'TanggalLahir' => 'required'
            ]);
            $mahasiswa = new Mahasiswa;
            $mahasiswa->Nim = $request->get('Nim');
            $mahasiswa->Nama = $request->get('Nama');
            $mahasiswa->Jurusan = $request->get('Jurusan');
            $mahasiswa->Email = $request->get('Email');
            $mahasiswa->Alamat = $request->get('Alamat');
            //$mahasiswa->save();
            //$kelas=new Kelas;
            //$kelas->id=$request->get('Kelas');
            $kelas=Kelas::find($request->get('Kelas'));
            $mahasiswa->Kelas()->associate($kelas);
            $mahasiswa->TanggalLahir = $request->get('TanggalLahir');
            $mahasiswa->save();
            // //fungsi eloquent untuk menambah data
            // //  Mahasiswa::create($request->all());
            // $mahasiswa->save();
            //jika data berhasil ditambahkan, akan kembali ke halaman utama
            return redirect()->route('mahasiswa.index')
                ->with('success', 'Mahasiswa Berhasil Ditambahkan');
        }
    public function show($Nim)
        {
            //menampilkan detail data dengan menemukan/berdasarkan Nim Mahasiswa
            //code sebelum dibuat relasi-->$mahasiswa=mahasiswa::find($nim);
            //$Mahasiswa = Mahasiswa::find($Nim);
            $mahasiswa=Mahasiswa::with('kelas')->where('nim',$Nim)->first();
            //return view('mahasiswa.detail', compact('Mahasiswa'));
            return view('mahasiswa.detail', ['Mahasiswa'=>$mahasiswa]);
        }
    public function edit($Nim)
        {
        //menampilkan detail data dengan menemukan berdasarkan Nim Mahasiswa untuk diedit
            $Mahasiswa = DB::table('mahasiswa')->where('nim', $Nim)->first();;
            return view('mahasiswa.edit', compact('Mahasiswa'));
        }
    public function update(Request $request, $Nim)
        {
            //melakukan validasi data
            $request->validate([
                'Nim' => 'required',
                'Nama' => 'required',
                'Kelas' => 'required',
                'Jurusan' => 'required',
                'Email' => 'required',
                'Alamat' => 'required',
                'TanggalLahir' => 'required'
            ]);
            //fungsi eloquent untuk mengupdate data inputan kita
            Mahasiswa::find($Nim)->update($request->all());
                //jika data berhasil diupdate, akan kembali ke halaman utama
                return redirect()->route('mahasiswa.index')
                    ->with('success', 'Mahasiswa Berhasil Diupdate');
        }
    public function destroy($Nim)
        {
            //fungsi eloquent untuk menghapus data
            Mahasiswa::find($Nim)->delete();
            return redirect()->route('mahasiswa.index')
                -> with('success', 'Mahasiswa Berhasil Dihapus');
        }
};