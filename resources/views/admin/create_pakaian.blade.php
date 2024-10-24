{{-- resources/views/pakaian/create.blade.php --}}

@extends('template.layout_admin')

@section('title', 'Tambah Pakaian')

@section('main')

<div class="container-fluid">
    <h1 class="my-4">Tambah Pakaian</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pakaian.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="pakaian_nama">Nama Pakaian</label>
            <input type="text" name="pakaian_nama" class="form-control" id="pakaian_nama" required>
        </div>
        
        <div class="form-group">
            <label for="pakaian_harga">Harga</label>
            <input type="number" name="pakaian_harga" class="form-control" id="pakaian_harga" placeholder="Masukan Harga Contoh:10.000" required>
        </div>
        
        <div class="form-group">
            <label for="pakaian_stok">Stok</label>
            <input type="number" name="pakaian_stok" class="form-control" id="pakaian_stok" required>
        </div>
    
        <div class="form-group">
            <label for="pakaian_kategori_pakaian_id">Kategori</label>
            <select name="pakaian_kategori_pakaian_id" class="form-control" id="pakaian_kategori_pakaian_id" required>
                @foreach($kategoriPakaian as $kategori)
                    <option value="{{ $kategori->kategori_pakaian_id }}">{{ $kategori->kategori_pakaian_nama }}</option>
                @endforeach
            </select>
        </div>
    
        <div class="form-group">
            <label for="pakaian_gambar_url">Gambar</label>
            <input type="file" name="pakaian_gambar_url" class="form-control" id="pakaian_gambar_url" accept="image/*" required>
        </div>
    
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
    
</div>

@endsection
