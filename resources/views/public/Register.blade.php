<div class="container-fluid p-0" style="min-height: 100vh;">
    <div class="row justify-content-center align-items-center" style="min-height: 100vh; background-size: cover; background-position: center; background-repeat: no-repeat;">
        
        <!-- Form Pendaftaran -->
        <div class="col-lg-6 col-md-6 col-10 d-flex align-items-center justify-content-center">
            <div class="card shadow-lg border-2 rounded-lg w-100" style="background-color:white;">
                <div class="card-body p-5">
                    <h2 class="text-center mb-4 text-primary">Pendaftaran Pengguna</h2>
                    <hr>
                    <form action="{{ route('register.store') }}" method="POST"> <!-- Perubahan di sini -->
                        @csrf
                        <div class="form-group mb-3">
                            <label for="user_nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="user_nama" name="fullname" placeholder="Masukkan nama lengkap" required> <!-- Perubahan nama field -->
                        </div>
                        <div class="form-group mb-3">
                            <label for="user_alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="user_alamat" name="alamat" placeholder="Masukkan alamat" required> <!-- Perubahan nama field -->
                        </div>
                        <div class="form-group mb-3">
                            <label for="user_username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="user_username" name="username" placeholder="Masukkan username" required> <!-- Perubahan nama field -->
                        </div>
                        <div class="form-group mb-3">
                            <label for="user_email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="user_email" name="email" placeholder="Masukkan email" required> <!-- Perubahan nama field -->
                        </div>
                        <div class="form-group mb-3">
                            <label for="user_notelp" class="form-label">Nomor Telepon</label>
                            <input type="text" class="form-control" id="user_notelp" name="nohp" placeholder="Masukkan nomor telepon" required> <!-- Perubahan nama field -->
                        </div>
                        <div class="form-group mb-4">
                            <label for="user_password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="user_password" name="password" placeholder="Masukkan password" required> <!-- Perubahan nama field -->
                        </div>
                        <button type="submit" class="btn btn-primary w-100 py-2">Daftar</button>
                    </form>
                    <p class="text-center mt-3">
                        Sudah memiliki akun? <a href="{{ route('login') }}" class="text-decoration-none text-primary">Masuk di sini</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Link ke CSS dan JS -->
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
<script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
<link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
<link href="{{ asset('css/custom-styles.css') }}" rel="stylesheet" />
