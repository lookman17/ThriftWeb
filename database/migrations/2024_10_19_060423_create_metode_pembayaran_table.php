<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetodePembayaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metode_pembayaran', function (Blueprint $table) {
            $table->increments('metode_pembayaran_id'); // Auto-increment untuk metode pembayaran
            $table->unsignedBigInteger('metode_pembayaran_user_id'); // Foreign key ke users, gunakan unsignedBigInteger
            $table->enum('metode_pembayaran_jenis', ['DANA', 'OVO', 'BCA', 'COD']);
            $table->string('metode_pembayaran_nomor', 50)->nullable(); // Nomor pembayaran bisa nullable
            $table->timestamps();

            // Set foreign key constraint
            $table->foreign('metode_pembayaran_user_id')
                  ->references('id') // Mengacu pada kolom id di tabel users
                  ->on('users')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('metode_pembayaran');
    }
}
