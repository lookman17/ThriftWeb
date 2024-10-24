@extends('template.layout_admin')

@section('title', 'Edit Kategori Pakaian')

@section('main')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 col-md-4">
            @include('template.sidebar')
        </div>
        <div class="col-lg-6">
            <h2>Edit Kategori Pakaian</h2>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('kategoriPakaian.update', $kategori->kategori_pakaian_id) }}" method="POST">
                @csrf
                @method('PATCH')
                
                <div class="mb-3">
                    <label for="kategori_pakaian_nama" class="form-label">Nama Kategori Pakaian</label>
                    <input type="text" class="form-control" id="kategori_pakaian_nama" name="kategori_pakaian_nama" value="{{ old('kategori_pakaian_nama', $kategori->kategori_pakaian_nama) }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update Kategori</button>
            </form>
        </div>
    </div>
</div>
@include('template.footer')
@endsection
