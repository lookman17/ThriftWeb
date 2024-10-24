<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePakaianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pakaian', function (Blueprint $table) {
            $table->increments('pakaian_id'); // Auto-increment
            $table->unsignedInteger('pakaian_kategori_pakaian_id'); // Foreign key
            $table->string('pakaian_nama', 50);
            $table->string('pakaian_harga', 50);
            $table->string('pakaian_stok', 100);
            $table->string('pakaian_gambar_url', 255); // Kolom untuk URL gambar
            $table->timestamps();

            // Set foreign key constraint
            $table->foreign('pakaian_kategori_pakaian_id')
                  ->references('kategori_pakaian_id')
                  ->on('kategori_pakaian')
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
        Schema::dropIfExists('pakaian');
    }
}
