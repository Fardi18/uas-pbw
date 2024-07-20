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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('bengkel_id');
            $table->foreign('bengkel_id')->references('id')->on('bengkels')->onDelete('cascade');
            $table->dateTime('waktu_booking');
            $table->string('brand');
            $table->string('model');
            $table->string('plat');
            $table->string('tahun_pembuatan');
            $table->integer('kilometer');
            $table->enum('transmisi', array('Manual', 'Matic'));
            $table->enum('booking_status', array('Pending', 'Diterima', 'Ditolak', 'Selesai'));
            $table->longText('catatan_tambahan')->nullable();
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
        Schema::dropIfExists('bookings');
    }
};
