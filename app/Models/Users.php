<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable implements AuthenticatableContract
{
    use HasFactory;

    protected $table = 'users'; // Nama tabel
    protected $primaryKey = 'user_id'; // Kunci primer
    public $incrementing = false; // ID tidak auto increment
    public $timestamps = true; // Mengaktifkan timestamps

    protected $fillable = [
        'user_id',
        'user_username',
        'user_password',
        'user_fullname',
        'user_email',
        'user_nohp',
        'user_alamat',
        'user_profil_url', // Menyimpan URL gambar profil
        'user_level',
    ];

    // Metode untuk mengupload profil
    public static function upload_profile($id, $data)
    {
        $user = self::find($id);

        if ($user) {
            // Hapus gambar lama jika ada
            if ($user->user_profil_url) {
                Storage::delete($user->user_profil_url);
            }

            // Simpan gambar baru
            if ($data) {
                $path = $data->store('public/profile_pictures');
                $user->user_profil_url = $path; // Simpan URL ke dalam kolom
            }

            $user->save(); // Simpan perubahan ke database
            return true; // Kembalikan true jika berhasil
        }

        return false; // Kembalikan false jika tidak menemukan user
    }

    // Metode untuk upload profil admin
    public function upload_admin_profile($request, $id)
    {
        if ($request->hasFile('profile')) {
            $file = $request->file('profile');

            // Panggil metode upload_profile
            if (self::upload_profile($id, $file)) {
                return true; // Kembalikan true jika berhasil
            }
        }

        return false; // Kembalikan false jika tidak ada file yang diupload
    }

    // Metode untuk mendaftar user
    protected static function register($data)
    {
        return self::create($data);
    }

    // Menambahkan metode untuk mengembalikan password yang di-hash
    public function getAuthPassword()
    {
        return $this->user_password; // Mengembalikan password yang di-hash
    }

    // Relasi dengan peminjaman
    public function peminjamans()
    {
        return $this->hasMany(Pakaian::class, 'peminjaman_user_id', 'user_id');
    }
}
