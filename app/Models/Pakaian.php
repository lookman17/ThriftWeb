<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pakaian extends Model
{
    use HasFactory;

    // Nama tabel yang direpresentasikan oleh model ini
    protected $table = 'pakaian';

    // Primary key dari tabel
    protected $primaryKey = 'pakaian_id';

    // Kolom-kolom yang dapat diisi
    protected $fillable = [
        'pakaian_kategori_pakaian_id',
        'pakaian_nama',
        'pakaian_harga',
        'pakaian_stok',
        'pakaian_gambar_url'
    ];

    // Relasi ke tabel kategori_pakaian
    public function kategoriPakaian()
    {
        return $this->belongsTo(KategoriPakaian::class, 'pakaian_kategori_pakaian_id', 'kategori_pakaian_id');
    }
}
