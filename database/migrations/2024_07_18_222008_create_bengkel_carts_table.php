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
        Schema::create('bengkel_carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bengkel_id');
            $table->foreign('bengkel_id')->references('id')->on('bengkels')->onDelete('cascade');
            $table->foreignId('booking_id');
            $table->foreign('booking_id')->references('id')->on('bookings')->onDelete('cascade');
            $table->foreignId('product_id')->nullable();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreignId('layanan_id')->nullable();
            $table->foreign('layanan_id')->references('id')->on('layanans')->onDelete('cascade');
            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('quantity');
            $table->bigInteger('price');
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
        Schema::dropIfExists('bengkel_carts');
    }
};
