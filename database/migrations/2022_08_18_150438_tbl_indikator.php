<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblIndikator extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('indikator')) {
            Schema::create('indikator', function (Blueprint $table) {
                $table->bigIncrements('id');
                 $table->text('balita_id')->nullable();
                 $table->text('imunisasi_dasar')->nullable();
                 $table->text('ukur_berat')->nullable();
                 $table->text('ukur_tinggi')->nullable();
                 $table->text('konseling_gizi')->nullable();
                 $table->text('kunjungan_rumah')->nullable();
                 $table->text('air_bersih')->nullable();
                 $table->text('jamban_sehat')->nullable();
                 $table->text('akta_lahir')->nullable();
                 $table->text('jaminan_kesehatan')->nullable();
                 $table->text('pengasuhan')->nullable();

                 $table->text('tinggi')->nullable();
                 $table->text('berat')->nullable();
                 $table->text('panjang')->nullable();
                 
                 $table->text('suntikan')->nullable();
                 $table->text('hasil')->nullable();
                

                 $table->dateTime('tanggal')->nullable();
                 $table->text('status')->nullable();
            });
        } 

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::dropIfExists('indikator');
    }
}
