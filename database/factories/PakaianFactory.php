<?php

namespace Database\Factories;

use App\Models\Pakaian;
use App\Models\KategoriPakaian;
use Illuminate\Database\Eloquent\Factories\Factory;

class PakaianFactory extends Factory
{
    protected $model = Pakaian::class;

    public function definition()
    {
        // Mengambil kategori secara acak, pastikan ada data
        $kategori = KategoriPakaian::inRandomOrder()->first();

        return [
            'pakaian_kategori_pakaian_id' => $kategori ? $kategori->kategori_pakaian_id : null, // Ambil kategori secara acak
            'pakaian_nama' => $this->faker->word,
            'pakaian_harga' => $this->faker->numberBetween(10000, 100000),
            'pakaian_stok' => $this->faker->numberBetween(1, 100),
            'pakaian_gambar_url' => 'https://via.placeholder.com/50',
        ];
    }
}
