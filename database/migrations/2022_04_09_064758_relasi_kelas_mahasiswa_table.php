<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelasiKelasMahasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mahasiswa',function(Blueprint $table){
            $table->dropColumn('kelas');
            $table->unsignedBigInteger('kelas_id')->nullable();//Menambahkan kolom kelas_id
            $table->Foreign('kelas_id')->references('id')->on('kelas');//Menambahkan foreign key di kolom kelas_id

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        $table->string('kelas');
        $table->dropForeign(['kelas_id']);
    }
}
