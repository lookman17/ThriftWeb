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
            <h1 class="my-4 card bg bg-light" style="text-align: center;">Daftar Pakaian</h1>

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
                <a href="{{ route('pakaian.create') }}" class="btn btn-primary">Tambah Pakaian</a>
            </div>

            <!-- Tabel Pakaian -->
            <table class="table table-bordered able">
                <thead class="table table-light">
                    <tr>
                        <th>ID</th>
                        <th>Nama Pakaian</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Gambar</th>
                        <th>Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pakaian as $item)
                        <tr>
                            <td>{{ $item->pakaian_id }}</td>
                            <td>{{ $item->pakaian_nama }}</td>
                            <td>{{ $item->pakaian_harga }}</td>
                            <td>{{ $item->pakaian_stok }}</td>
                            <td><img src="{{ asset('storage/' . $item->pakaian_gambar_url) }}" alt="Gambar Pakaian" width="100"></td>
                            <td>{{ $item->kategoriPakaian->kategori_pakaian_nama }}</td>
                            <td>
                                <!-- Tombol Edit -->
                                <a href="{{ route('pakaian.edit', $item->pakaian_id) }}" class="btn btn-primary btn-sm ">Edit</a>

                                <!-- Tombol Hapus -->
                                <form action="{{ route('pakaian.destroy', $item->pakaian_id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Pagination (Jika Diperlukan) -->
            {{ $pakaian->links('vendor.pagination.bootstrap-5') }}
        </div>
    </div>  
</div>
@include('template.footer')
@endsection
