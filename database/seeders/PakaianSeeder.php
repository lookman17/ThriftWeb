<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pakaian;

class PakaianSeeder extends Seeder
{
    public function run()
    {
        // Mengisi tabel pakaian dengan 50 data dummy
        Pakaian::factory()->count(20)->create();
    }
}
