<?php

namespace Database\Factories;

use App\Models\KategoriPakaian;
use Illuminate\Database\Eloquent\Factories\Factory;

class KategoriPakaianFactory extends Factory
{
    protected $model = KategoriPakaian::class;

    public function definition()
    {
        return [
            'kategori_pakaian_nama' => $this->faker->word(), // Menghasilkan nama kategori acak
        ];
    }
}
