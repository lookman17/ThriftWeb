@extends('template.layout_pengguna')

@section('main')
<div class="container">
    <h1>Edit Pakaian</h1>

    <form action="{{ route('pakaian.update', $pakaian->pakaian_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="pakaian_nama" class="form-label">Nama Pakaian</label>
            <input type="text" class="form-control" id="pakaian_nama" name="pakaian_nama" value="{{ $pakaian->pakaian_nama }}" required>
        </div>
        <div class="mb-3">
            <label for="pakaian_harga" class="form-label">Harga</label>
            <input type="text" class="form-control" id="pakaian_harga" name="pakaian_harga" value="{{ $pakaian->pakaian_harga }}" required>
        </div>
        <div class="mb-3">
            <label for="pakaian_stok" class="form-label">Stok</label>
            <input type="text" class="form-control" id="pakaian_stok" name="pakaian_stok" value="{{ $pakaian->pakaian_stok }}" required>
        </div>
        <div class="mb-3">
            <label for="pakaian_gambar_url" class="form-label">Gambar</label>
            <input type="file" class="form-control" id="pakaian_gambar_url" name="pakaian_gambar_url">
            <img src="{{ asset('storage/' . $pakaian->pakaian_gambar_url) }}" alt="Gambar Pakaian" width="100">
        </div>
        <div class="mb-3">
            <label for="pakaian_kategori_pakaian_id" class="form-label">Kategori</label>
            <select class="form-control" id="pakaian_kategori_pakaian_id" name="pakaian_kategori_pakaian_id">
                @foreach($kategoriPakaian as $kat)
                <option value="{{ $kat->kategori_pakaian_id }}" {{ $kat->kategori_pakaian_id == $pakaian->pakaian_kategori_pakaian_id ? 'selected' : '' }}>{{ $kat->kategori_pakaian_nama }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
