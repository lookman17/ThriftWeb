<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriPakaian extends Model
{
    use HasFactory;

    protected $table = 'kategori_pakaian'; // Nama tabel di database
    protected $primaryKey = 'kategori_pakaian_id'; // Nama kolom primary key di tabel
    public $incrementing = false;
    public $timestamps = false;
    protected $keyType = 'string';

    protected $fillable = [
        'kategori_pakaian_id',
        'kategori_pakaian_nama', // Kolom yang ingin diisi secara massal
    ];

    // Metode untuk membaca semua kategori
    public static function readKategori()
    {
        return self::all();
    }

    // Metode untuk membaca kategori berdasarkan ID
    public static function readKategoriById($id)
    {
        return self::find($id);
    }
    public function pakaian()
    {
        return $this->hasMany(Pakaian::class, 'pakaian_kategori_pakaian_id', 'kategori_pakaian_id');
    }
        
}
