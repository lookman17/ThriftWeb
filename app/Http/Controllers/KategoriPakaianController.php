<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriPakaian;


class KategoriPakaianController extends Controller
{   
    public function create_kategori() {
        return view('admin.create_kategori_pakaian');
    }
    // Method untuk menyimpan data kategori ke database
    public function create(Request $request)
    {
        // Validasi input form
        $request->validate([
            'kategori_pakaian_nama' => 'required|string|max:255',
        ]);

        // Buat kategori baru
        KategoriPakaian::create([
            'kategori_pakaian_nama' => $request->kategori_pakaian_nama,
        ]);

        // Redirect ke halaman daftar kategori setelah penyimpanan
        return redirect()->route('kategoriPakaian')->with('success', 'Kategori berhasil ditambahkan!');
    }
    public function edit($kategori_pakaian_id)
{
    $kategori = KategoriPakaian::findOrFail($kategori_pakaian_id);
    return view('admin.update_kategori_pakaian', compact('kategori'));
}

    // Method untuk memperbarui data kategori
    public function update(Request $request, $kategori_pakaian_id)
    {
        // Validasi input form
        $request->validate([
            'kategori_pakaian_nama' => 'required|string|max:255',
        ]);

        // Cari kategori berdasarkan ID
        $kategori = KategoriPakaian::findOrFail($kategori_pakaian_id);
        $kategori->update([
            'kategori_pakaian_nama' => $request->kategori_pakaian_nama,
        ]);

        // Redirect ke halaman daftar kategori setelah pembaruan
        return redirect()->route('kategoriPakaian')->with('success', 'Kategori berhasil diperbarui!');
    }

    // Method untuk menghapus data kategori
    public function delete($kategori_pakaian_id)
    {
        // Hapus kategori berdasarkan ID
        KategoriPakaian::destroy($kategori_pakaian_id);

        // Redirect setelah penghapusan
        return redirect()->route('kategoriPakaian')->with('deleted', 'Kategori berhasil dihapus!');
    }

    // Method untuk menampilkan daftar kategori
    public function index()
{
    // Mengambil data kategori pakaian dengan pagination (10 per halaman)
    $kategoris = KategoriPakaian::paginate(10);
    
    return view('admin.kategori_pakaian', compact('kategoris'));
}

}
