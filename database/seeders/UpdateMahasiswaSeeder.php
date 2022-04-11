<?php

namespace Database\Seeders;
use DB;
use Illuminate\Database\Seeder;

class UpdateMahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //update data mahasiswa saat ini milik TI 2A
        DB::table('mahasiswa')->update(['kelas_id'=>1]);
    }
}
