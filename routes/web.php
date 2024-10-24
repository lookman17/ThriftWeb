<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    UsersController,
    PagesController,
    KategoriPakaianController,
    PakaianController,
};
use App\Models\KategoriPakaian;

Route::get('/', function () {
    return redirect()->route('login');

});
    //Login
    Route::get('/login', [UsersController::class, 'index'])->name('login');
    Route::get('/register', [UsersController::class, 'daftar'])->name('register');
    Route::post('/register/store', [UsersController::class, 'register'])->name('register.store');
    Route::post('/login', [UsersController::class, 'login'])->name('login.store');
    Route::get('/logout', [UsersController::class, 'logout'])->name('logout');

    //user
    Route::post('/user/{id}/profile', [UsersController::class, 'upload_profile'])->name('profile.upload');
    Route::post('/admin/{id}/profile', [UsersController::class, 'upload_admin_profile'])->name('admin.profile.upload');

    //admin
    Route::get('/dashboard/pengguna', [PagesController::class, 'dashboard_pengguna'])->name('dashboard_pengguna');
    //kategori
    Route::get('/kategori-pakaian', [KategoriPakaianController::class, 'index'])->name('kategoriPakaian');
    Route::get('/kategori-pakaian/create', [KategoriPakaianController::class, 'create_kategori'])->name('create_kategori');
    Route::post('/kategori-pakaian/store', [KategoriPakaianController::class, 'create'])->name('kategoriPakaian.create');
    Route::get('kategori-pakaian/update/{kategori_pakaian_id}', [KategoriPakaianController::class, 'edit'])->name('kategoriPakaian.edit');
    Route::patch('kategori-pakaian/update/{kategori_pakaian_id}', [KategoriPakaianController::class, 'update'])->name('kategoriPakaian.update');
    Route::delete('/kategori-pakaian/delete/{id}', [KategoriPakaianController::class, 'delete'])->name('kategoriPakaian.delete');
   //pakaian
    Route::get('/pakaian', [PakaianController::class, 'index'])->name('pakaian');
    Route::get('/pakaian/create', [PakaianController::class, 'create'])->name('pakaian.create');
    Route::post('/pakaian', [PakaianController::class, 'store'])->name('pakaian.store');
    Route::get('/pakaian/{id}/edit', [PakaianController::class, 'edit'])->name('pakaian.edit');
    Route::patch('/pakaian/{id}', [PakaianController::class, 'update'])->name('pakaian.update');
    Route::delete('/pakaian/{id}', [PakaianController::class, 'destroy'])->name('pakaian.destroy');
    //pengguna
    Route::get('/dashboard/admin', [PagesController::class, 'dashboard_admin'])->name('dashboard_admin');
    


Route::get('/pakaian/pengguna',[PakaianController::class,'showpakaian'])->name('showpakaian');
