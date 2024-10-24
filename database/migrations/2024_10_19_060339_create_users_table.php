<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Ini secara otomatis membuat kolom user_id sebagai AUTO_INCREMENT
            $table->string('user_username', 50)->unique();
            $table->string('user_password', 255);
            $table->string('user_fullname', 100);
            $table->char('user_email', 50);
            $table->char('user_nohp', 13);
            $table->string('user_alamat', 200);
            $table->string('user_profil_url', 255)->nullable(); // Profil URL bisa nullable
            $table->enum('user_level', ['Admin', 'Pengguna']);
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
        Schema::dropIfExists('users');
    }
}
