<?php

namespace Database\Seeders;

use App\Models\KategoriPakaian;
use Illuminate\Database\Seeder;

class KategoriPakaianSeeder extends Seeder
{
    public function run()
    {
        // Menggunakan kategori_pakaian_nama sesuai dengan struktur tabel
        KategoriPakaian::create(['kategori_pakaian_id' => 1, 'kategori_pakaian_nama' => 'Atasan']);
        KategoriPakaian::create(['kategori_pakaian_id' => 2, 'kategori_pakaian_nama' => 'Bawahan']);
        KategoriPakaian::create(['kategori_pakaian_id' => 3, 'kategori_pakaian_nama' => 'Aksesoris']);
        // Tambahkan kategori lain sesuai kebutuhan
    }
}
