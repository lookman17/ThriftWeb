<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembelianTable extends Migration
{
    public function up()
    {
        Schema::create('pembelian', function (Blueprint $table) {
            $table->increments('pembelian_id'); // Primary key
            $table->unsignedBigInteger('pembelian_user_id'); // Foreign key ke users, gunakan unsignedBigInteger
            $table->unsignedInteger('pembelian_metode_pembayaran_id'); // Foreign key ke metode_pembayaran
            $table->timestamp('pembelian_tanggal');
            $table->integer('pembelian_total_harga');
            $table->timestamps();

            // Foreign key ke users
            $table->foreign('pembelian_user_id')
                  ->references('id') // Mengacu ke id di tabel users
                  ->on('users')
                  ->onDelete('cascade');

            // Foreign key ke metode_pembayaran
            $table->foreign('pembelian_metode_pembayaran_id')
                  ->references('metode_pembayaran_id') // Mengacu ke metode_pembayaran_id
                  ->on('metode_pembayaran')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pembelian');
    }
}
