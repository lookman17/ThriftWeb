@extends('template.layout_admin')

@section('title', 'Tambah Kategori Pakaian')

@section('main')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-3 col-md-4">
            @include('template.sidebar')
        </div>
        
        <div class="col-md-8 offset-md-2">
            
            <h3 class="text-center">Tambah Kategori Pakaian</h3>

            <!-- Tampilkan pesan sukses jika ada -->
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Tampilkan pesan error jika ada -->
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form untuk menambah kategori -->
            <form action="{{ route('kategoriPakaian.create') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="kategori_pakaian_nama">Nama Kategori</label>
                    <input type="text" name="kategori_pakaian_nama" id="kategori_pakaian_nama" class="form-control" placeholder="Masukkan nama kategori" value="{{ old('kategori_pakaian_nama') }}" required>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('kategoriPakaian') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
