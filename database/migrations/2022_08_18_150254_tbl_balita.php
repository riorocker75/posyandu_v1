<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblBalita extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('balita')) {
            Schema::create('balita', function (Blueprint $table) {
                $table->bigIncrements('id');
                 $table->text('nama');
                 $table->text('jenis_kelamin')->nullable();
                 $table->dateTime('tanggal_lahir')->nullable();
                 $table->text('umur')->nullable();
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
       Schema::dropIfExists('balita');
    }
}
