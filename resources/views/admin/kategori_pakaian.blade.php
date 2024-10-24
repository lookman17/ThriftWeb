@extends('template.layout_admin')

@section('title', 'Dashboard Toko Thrift')

@section('main')

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-lg-3 col-md-4">
            @include('template.sidebar')
        </div>

        <!-- Main Content -->
        <div class="col-lg-9 col-md-8 card">
            <h1 class="my-4 card text-center bg bg-light">Kategori Pakaian</h1>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Tombol Create -->
            <div class="mb-3 card">
                <a href="{{ route('create_kategori') }}" class="btn btn-primary">Tambah Kategori</a>
            </div>

            <!-- Tabel Kategori -->
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Nama Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kategoris as $kategori)
                        <tr>
                            <td>{{ $kategori->kategori_pakaian_id }}</td>
                            <td>{{ $kategori->kategori_pakaian_nama }}</td>
                            <td>
                                <!-- Tombol Edit -->
                                <a href="{{ route('kategoriPakaian.edit', $kategori->kategori_pakaian_id) }}" class="btn btn-primary btn-sm">Edit</a>

                                <!-- Tombol Hapus -->
                                <form action="{{ route('kategoriPakaian.delete', $kategori->kategori_pakaian_id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Pagination (Jika Diperlukan) -->
            {{ $kategoris->links('vendor.pagination.bootstrap-5') }}
        </div>
    </div>  
</div>
@include('template.footer')
@endsection
