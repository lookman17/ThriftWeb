<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UsersController extends Controller
{
    public function index() {
        return view('public.Login');
    }
    public function daftar() {
        return view('public.Register');
    }
    public function register(Request $request)
{
    $request->validate([
        'fullname' => 'required|string|max:100',
        'alamat' => 'required|string|max:200',
        'username' => 'required|string|max:50|unique:users,user_username',
        'email' => 'required|string|email|max:50|unique:users,user_email',
        'nohp' => 'required|string|max:13',
        'password' => 'required|string|min:6',
    ]);

    $user = new User();
    $user->user_fullname = $request->input('fullname');
    $user->user_alamat = $request->input('alamat');
    $user->user_username = $request->input('username'); // Ensure this is set
    $user->user_email = $request->input('email');
    $user->user_nohp = $request->input('nohp');
    $user->user_password = bcrypt($request->input('password'));
    $user->user_level = 'Pengguna'; // Ensure this has a value
    $user->save();

    return redirect()->route('login')->with('success', 'Pendaftaran berhasil.');
}



    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Mengambil kredensial dari permintaan
        $credentials = [
            'user_username' => $request->input('username'),
            'user_password' => $request->input('password')
        ];

        // Mencari pengguna berdasarkan username
        $user = User::where('user_username', $credentials['user_username'])->first();

        if ($user) {
            // Memeriksa apakah password cocok
            if (Hash::check($credentials['user_password'], $user->user_password)) {
                // Memeriksa level pengguna
                if (is_null($user->user_level) || $user->user_level === '') {
                    return back()->withErrors(['message' => 'Akun ini tidak memiliki level. Silakan hubungi admin.']);
                }

                Auth::login($user);
                Log::info('User ' . $user->user_fullname . ' telah login ke dalam aplikasi');

                // Redirect berdasarkan level pengguna
                if ($user->user_level === 'Pengguna') {
                    return redirect()->route('dashboard_pengguna'); // Rute untuk dashboard pengguna
                } elseif ($user->user_level === 'Admin') {
                    return redirect()->route('dashboard_admin'); // Rute untuk dashboard admin
                } else {
                    return back()->withErrors(['message' => 'Level pengguna tidak dikenali.']);
                }
            } else {
                return back()->withErrors(['message' => 'Username atau password Anda salah.']);
            }
        } else {
            return back()->withErrors(['message' => 'Username atau password Anda salah.']);
        }
    }

    public function logout()
    {
        Auth::logout(); // Logout user yang sedang login
        return redirect()->route('login')->with('success', 'Anda telah berhasil logout.');
    }

    public function upload_profile(Request $request, $id)
    {
        if ($request->hasFile('profile')) {
            $data = $request->file('profile');
            $profilUrl = $data->store('profiles'); // Misalnya, menyimpan dalam folder 'profiles'

            // Mengupdate URL profil ke dalam database
            $user = User::find($id);
            if ($user) {
                $user->user_profil_url = $profilUrl;
                $user->save();
                return redirect()->route('profile')->with('success', 'Foto profil berhasil diperbarui!');
            }

            return back()->with('failed', 'User tidak ditemukan.');
        }

        return back()->with('failed', 'Foto profil gagal diperbarui!');
    }

    public function upload_admin_profile(Request $request, $id)
    {
        // Ambil instans dari User
        $user = User::find($id);
        
        if (!$user) {
            return back()->with('failed', 'User tidak ditemukan.');
        }

        if ($request->hasFile('profile')) {
            $data = $request->file('profile');
            $profilUrl = $data->store('profiles'); // Misalnya, menyimpan dalam folder 'profiles'

            $user->user_profil_url = $profilUrl; // Mengupdate URL profil
            $user->save();

            return redirect()->route('admin.profile')->with('success', 'Foto profil berhasil diperbarui!');
        } else {
            return back()->with('failed', 'Foto profil gagal diperbarui! Tidak ada file yang diupload.');
        }
    }
}
