<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembelianDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembelian_detail', function (Blueprint $table) {
            $table->integer('pembelian_detail_id')->primary();
            $table->unsignedInteger('pembelian_detail_pembelian_id'); // Foreign key ke tabel pembelian
            $table->unsignedInteger('pembelian_detail_pakaian_id'); // Foreign key ke tabel pakaian
            $table->integer('pembelian_detail_jumlah');
            $table->integer('pembelian_total_harga');
            $table->timestamps();

            // Set foreign key constraints
            $table->foreign('pembelian_detail_pembelian_id')
                  ->references('pembelian_id')
                  ->on('pembelian')
                  ->onDelete('cascade');

            $table->foreign('pembelian_detail_pakaian_id')
                  ->references('pakaian_id')
                  ->on('pakaian')
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
        Schema::dropIfExists('pembelian_detail');
    }
}
