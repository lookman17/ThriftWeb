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
        <div class="col-lg-9 col-md-8">
            <h1 class="mt-4 text-center">Home</h1>
            <hr>
            <div class="row mt-4">
                <!-- Kartu Total Penjualan -->
                <div class="col-lg-4 col-md-10 mb-10">
                    <div class="card text-white bg-success shadow">
                        <div class="card-body">
                            <h5 class="card-title">Total Penjualan</h5>
                            <p class="card-text">Rp. 0</p>
                        </div>
                    </div>
                </div>

                <!-- Kartu Produk Tersedia -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card text-white bg-primary shadow">
                        <div class="card-body">
                            <h5 class="card-title">Produk Tersedia</h5>
                            <p class="card-text">0 Produk</p>
                        </div>
                    </div>
                </div>

                <!-- Kartu Pengguna Terdaftar -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card text-white bg-warning shadow">
                        <div class="card-body">
                            <h5 class="card-title">Pengguna Terdaftar</h5>
                            <p class="card-text">0 Pengguna</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-lg-6 mb-4">
                    <div class="card shadow">
                        <img src="{{ asset('img/toko-baju.jpg') }}" class="card-img-top" alt="Gambar Toko">
                        <div class="card-body">
                            <h5 class="card-title">Shova Nexa Thrift</h5>
                            <p class="card-text">Toko kami menyajikan berbagai produk thrift terbaik untuk Anda.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mb-4">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="card-title">Lokasi Toko</h5>
                            <p class="card-text">Jl. Contoh Alamat No. 123, Kota Contoh</p>
                            <a href="https://www.google.com/maps" target="_blank" class="btn btn-primary">Lihat di Google Maps</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('template.footer')
@endsection
