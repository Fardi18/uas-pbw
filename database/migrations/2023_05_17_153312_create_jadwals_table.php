<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwals', function (Blueprint $table) {
            $table->id();
            // senin
            $table->time('senin_buka');
            $table->time('senin_tutup');
            // selasa
            $table->time('selasa_buka');
            $table->time('selasa_tutup');
            // rabu
            $table->time('rabu_buka');
            $table->time('rabu_tutup');
            // kamis
            $table->time('kamis_buka');
            $table->time('kamis_tutup');
            // jumat
            $table->time('jumat_buka');
            $table->time('jumat_tutup');
            // sabtu
            $table->time('sabtu_buka')->nullable();
            $table->time('sabtu_tutup')->nullable();
            // minggu
            $table->time('minggu_buka')->nullable();
            $table->time('minggu_tutup')->nullable();
            $table->foreignId('bengkel_id');
            $table->foreign('bengkel_id')->references('id')->on('bengkels')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwals');
    }
};
