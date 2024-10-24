@extends('template.layout_pengguna')

@section('title', 'Daftar Pakaian')

@section('main')
<div class="container-fluid">
    <h1 class="my-4 text-center">Daftar Pakaian</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row gx-3 gy-4"> <!-- gx-3 untuk horizontal gap, gy-4 untuk vertical gap -->
        @foreach($pakaian as $item)
            <div class="col-md-3 mb-4"> <!-- Menggunakan col-md-3 untuk 4 card per baris -->
                <div class="card h-100">
                    <div class="card-img-container" style="height: 200px; overflow: hidden;">
                        <img src="{{ asset('storage/' . $item->pakaian_gambar_url) }}" class="card-img-top" alt="Gambar Pakaian" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $item->pakaian_nama }}</h5>
                        <p class="card-text">Harga: Rp {{ number_format($item->pakaian_harga, 0, ',', '.') }}</p>
                        <p class="card-text">Stok: {{ $item->pakaian_stok }}</p>
                        <p class="card-text">Kategori: {{ $item->kategoriPakaian->kategori_pakaian_nama }}</p>

                        <button type="button" class="btn btn-outline-primary mt-auto" data-bs-toggle="modal" data-bs-target="#detailModal{{ $item->pakaian_id }}">
                            Lihat Detail
                        </button>
                    </div>
                </div>
            </div>

            <!-- Modal untuk Lihat Detail -->
            <div class="modal fade" id="detailModal{{ $item->pakaian_id }}" tabindex="-1" aria-labelledby="detailModalLabel{{ $item->pakaian_id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="detailModalLabel{{ $item->pakaian_id }}">{{ $item->pakaian_nama }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="{{ asset('storage/' . $item->pakaian_gambar_url) }}" class="img-fluid" alt="Gambar Pakaian">
                                </div>
                                <div class="col-md-6">
                                    <p class="text-muted">Harga: Rp {{ number_format($item->pakaian_harga, 0, ',', '.') }}</p>
                                    <p class="text-muted">Stok: {{ $item->pakaian_stok }}</p>
                                    <p class="text-muted">Kategori: {{ $item->kategoriPakaian->kategori_pakaian_nama }}</p>
                                    <p>{{ $item->pakaian_deskripsi }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <a href="#" class="btn btn-primary">Beli Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination (Jika diperlukan) -->
    <div class="d-flex justify-content-center">
        {{ $pakaian->links('vendor.pagination.bootstrap-5') }}
    </div>
</div>

@include('template.footer')

@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection

<style>
    .card {
        width: 100%; /* Pastikan card mengisi lebar penuh kolom */
    }
    .modal-dialog {
        max-width: 90%; /* Mengatur modal agar tidak terlalu lebar */
        margin: 1.75rem auto;
    }
</style>
