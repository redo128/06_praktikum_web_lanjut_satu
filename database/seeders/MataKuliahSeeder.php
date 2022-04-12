<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class MataKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $matkul=[
            [
                'nama_matkul'=>'Pemrograman berbasis objek',
                'sks'=>3,
                'jam'=>6,
                'semester'=>4,
            ],
            [
                'nama_matkul'=>'Pemrograman web lanjut',
                'sks'=>3,
                'jam'=>6,
                'semester'=>4,
            ],
            [
                'nama_matkul'=>'basis data lanjut',
                'sks'=>3,
                'jam'=>6,
                'semester'=>4,
            ],
            [
                'nama_matkul'=>'praktikum basis data lanjut',
                'sks'=>3,
                'jam'=>6,
                'semester'=>4,
            ],
        ];
        DB::table('matakuliah')->insert($matkul);
    }
}
