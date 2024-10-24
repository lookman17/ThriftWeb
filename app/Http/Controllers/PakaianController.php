<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pakaian;
use App\Models\KategoriPakaian;
use Illuminate\Support\Facades\Storage;

class PakaianController extends Controller
{
    // Menampilkan semua data pakaian
    public function index()
    {
        $pakaian = Pakaian::with('kategoriPakaian')->paginate(10); // Pastikan relasi diatur dengan benar
        return view('admin.pakaian', compact('pakaian'));
    }
    public function showpakaian()
    {
        $pakaian = Pakaian::with('kategoriPakaian')->paginate(10); // Pastikan relasi diatur dengan benar
        return view('pengguna.pakaian', compact('pakaian'));
    }

    // Menampilkan form untuk menambahkan pakaian baru
    public function create()
    {
        // Ambil semua kategori pakaian untuk dropdown
        $kategoriPakaian = KategoriPakaian::all();
        return view('admin.create_pakaian', compact('kategoriPakaian'));
    }

    // Menyimpan data pakaian baru
    public function store(Request $request)
    {
        $request->validate([
            'pakaian_kategori_pakaian_id' => 'required|integer',
            'pakaian_nama' => 'required|string|max:50',
            'pakaian_harga' => 'required|numeric',
            'pakaian_stok' => 'required|integer',
            'pakaian_gambar_url' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        ]);
    
        // Upload gambar dan simpan URL
        if ($request->hasFile('pakaian_gambar_url')) {
            $image = $request->file('pakaian_gambar_url');
            $imagePath = $image->store('images/pakaian', 'public'); // Simpan di storage/app/public/images/pakaian
        }
    
        // Buat data pakaian baru
        Pakaian::create([
            'pakaian_kategori_pakaian_id' => $request->pakaian_kategori_pakaian_id,
            'pakaian_nama' => $request->pakaian_nama,
            'pakaian_harga' => $request->pakaian_harga,
            'pakaian_stok' => $request->pakaian_stok,
            'pakaian_gambar_url' => $imagePath, // Simpan URL gambar di database
        ]);
    
        return redirect()->route('pakaian')->with('success', 'Pakaian berhasil ditambahkan.');
    }
    

    // Menampilkan form untuk mengedit data pakaian
    public function edit($id)
    {
        $pakaian = Pakaian::findOrFail($id);
        $kategoriPakaian = KategoriPakaian::all(); // Ambil semua kategori untuk dropdown
        return view('admin.update_pakaian', compact('pakaian', 'kategoriPakaian'));
    }

    // Memperbarui data pakaian
    public function update(Request $request, $id)
    {
        $request->validate([
            'pakaian_kategori_pakaian_id' => 'required|integer',
            'pakaian_nama' => 'required|string|max:50',
            'pakaian_harga' => 'required|numeric',
            'pakaian_stok' => 'required|integer',
            'pakaian_gambar_url' => 'required|url|max:255',
        ]);

        $pakaian = Pakaian::findOrFail($id);
        $pakaian->update($request->all());

        return redirect()->route('pakaian')->with('success', 'Pakaian berhasil diperbarui.');
    }

    // Menghapus data pakaian
    public function destroy($id)
    {
        $pakaian = Pakaian::findOrFail($id);
        if ($pakaian->pakaian_gambar_url) {
            Storage::delete($pakaian->pakaian_gambar_url);
        }
        $pakaian->delete();

        return redirect()->route('pakaian')->with('success', 'Pakaian berhasil dihapus.');
    }
}
