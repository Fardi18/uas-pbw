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
        Schema::table('bengkels', function (Blueprint $table) {
            $table->foreignId('kecamatan_id');
            $table->foreign('kecamatan_id')->references('id')->on('kecamatans')->onDelete('cascade');
            $table->foreignId('kelurahan_id');
            $table->foreign('kelurahan_id')->references('id')->on('kelurahans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bengkels', function (Blueprint $table) {
            $table->dropColumn('kecamatan_id');
            $table->dropColumn('kelurahan_id');
        });
    }
};
